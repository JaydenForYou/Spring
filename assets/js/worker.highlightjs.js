'use strict';

onmessage = function onmessage(event) {
  var data = JSON.parse(event.data);
  var result = null;
  importScripts('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.0/build/highlight.min.js');

  if (data.lang !== null) {
    if (self.hljs.listLanguages().indexOf(data.lang) === -1 && data.lang !== 'html') {
      importScripts('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.0/build/languages/' + data.lang + '.min.js');
    }
    result = self.hljs.highlight(data.lang, data.code);
  } else {
    result = self.hljs.highlightAuto(data.code);
  }

  postMessage(JSON.stringify({
    result: {
      value: result.value,
      language: result.language,
    },
    index: data.index
  }));
}
