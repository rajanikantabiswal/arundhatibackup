jQuery.noConflict();
jQuery(document).ready(function ($) {
var headers = document.querySelectorAll(".its-accordion-header");
for (var i = 0; i < headers.length; i++) {
  headers[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

jQuery(document).ajaxComplete(function(event, xhr, options) {
  if (options.data && options.data.indexOf('action=woocommerce_load_variations') !== -1) {
    // for variable products
    var headers = document.querySelectorAll(".its-accordion-header");
for (var i = 0; i < headers.length; i++) {
  headers[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
  }
});
}); // end of jquery