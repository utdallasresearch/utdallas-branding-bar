/**
 * Element.prepend Polyfill (mostly for IE)
 * 
 * Source: https://github.com/jserz/js_piece/blob/master/DOM/ParentNode/prepend()/prepend().md
 */
(function (arr) {
  arr.forEach(function (item) {
    if (item.hasOwnProperty('prepend')) {
      return;
    }
    Object.defineProperty(item, 'prepend', {
      configurable: true,
      enumerable: true,
      writable: true,
      value: function prepend() {
        var argArr = Array.prototype.slice.call(arguments),
          docFrag = document.createDocumentFragment();

        argArr.forEach(function (argItem) {
          var isNode = argItem instanceof Node;
          docFrag.appendChild(isNode ? argItem : document.createTextNode(String(argItem)));
        });

        this.insertBefore(docFrag, this.firstChild);
      }
    });
  });
})([Element.prototype, Document.prototype, DocumentFragment.prototype]);

/**
 * Prepend the branding bar to the body
 */
(function () {

  document.addEventListener("DOMContentLoaded", function () {
    let bar = document.getElementById('utdallas-branding-bar');
    let body = document.getElementsByTagName('body')[0];

    body.prepend(bar);
  });

})();

