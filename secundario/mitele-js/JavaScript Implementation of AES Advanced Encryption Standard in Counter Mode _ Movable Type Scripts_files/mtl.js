/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
/*  MTL website JavaScript functions (c) Chris Veness 2008-2009                                   */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */

$(document).ready( function() {  // jQuery onload initialisation
                            
  // set external links to 'target=_blank'
  $('a[href^="http://"],a[href^="https://"]').attr("target","_blank");
  
  // make e-mail contact clickable link
  $('span.rtl').each( function() {
    var email = $(this).html();
    $(this).html('<a href="mailto:'+email.split('').reverse().join('')+'" rel="nofollow">'+email+'</a>');
  });
    
  // google analytics tracking code - use jQuery getScript() to load tracking code after DOM load is complete
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");  
  jQuery.getScript(gaJsHost + "google-analytics.com/ga.js", function(){  
    try {
      var pageTracker = _gat._getTracker("UA-966502-1");
      pageTracker._trackPageview();
    } catch(err) {}
  });  
  
}); 

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */

/*
 * extend String object with trim method (if not built in)
 *   note efficient formulation from blog.stevenlevithan.com
 */
if (typeof(String.prototype.trim) === "undefined") {
  String.prototype.trim = function() {
    return String(this).replace(/^\s\s*/, '').replace(/\s\s*$/, '');
  }
}

/*
 * add isNumber function (if not built in)
 *   JavaScript: The Good Parts, Douglas Crockford, O'Reilly
 */
if (typeof(isNumber) === "undefined") {
  var isNumber = function isNumber(value) { 
    return typeof value === 'number' && isFinite(value); 
  };
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
