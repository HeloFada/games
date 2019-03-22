/**
 * Array.indexOf for IE8 !
 */
if (!('indexOf' in Array.prototype)) {
  Array.prototype.indexOf = function(obj, start) {
    for (var i = (start || 0), j = this.length; i < j; i++) {
      if (this[i] === obj) { return i; }
    }
    return -1;
  };
}

/**
 * returns form fields as a plain object
 */
$.fn.serializePlainObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name]) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
        o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};

/**
 * inverse of jQuery.param
 * http://stackoverflow.com/a/3355892/1207670
 */
$.deparam = function(p, replace_plus) {
  replace_plus = replace_plus || false;
  var params = {};
  if (p[0] == '?') p = p.substr(1);
  var pairs = p.split('&');
  for (var i=0; i<pairs.length; i++) {
    var pair = pairs[i].split('=');
    var accessors = [];
    var name = decodeURIComponent(pair[0]), value = decodeURIComponent(pair[1]);

    if (replace_plus) value = value.replace('+', ' ');

    var name = name.replace(/\[([^\]]*)\]/g, function(k, acc) { accessors.push(acc); return ""; });
    accessors.unshift(name);
    var o = params;

    for (var j=0; j<accessors.length-1; j++) {
      var acc = accessors[j];
      var nextAcc = accessors[j+1];
      if (!o[acc]) {
        if ((nextAcc == "") || (/^[0-9]+$/.test(nextAcc)))
          o[acc] = [];
        else
          o[acc] = {};
      }
      o = o[acc];
    }
    acc = accessors[accessors.length-1];
    if (acc == "")
      o.push(value);
    else
      o[acc] = value;
  }
  return params;
};

/**
 * http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript
 */
function str2url(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap Ã± for n, etc
  var from = "Ã Ã¡Ã¤Ã¢Ã¨Ã©Ã«ÃªÃ¬Ã­Ã¯Ã®Ã²Ã³Ã¶Ã´Ã¹ÃºÃ¼Ã»Ã±Ã§Â·/,:;";
  var to   = "aaaaeeeeiiiioooouuuunc-----";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 _-]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
};

/**
 * http://phpjs.org/functions/ucwords
 */
function ucwords(str) {
  str = str.toLowerCase();
  return (str + '').replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function ($1) {
    return $1.toUpperCase();
  });
};


var Core = new function() {
  "use strict";

  var __this = this;

  this.urlRoot; // root url
  this.tplRoot; // url to templates directory
  this.apiRoot; // url to API
  this.isTouch = 'ontouchstart' in window || !!navigator.msMaxTouchPoints;
  this.appName = 'Relations industrielles TSE';

  var loader;


  /*
   * init
   */
  this.init = function(url) {
    __this.urlRoot = url;
    __this.tplRoot = url + 'resources/tpl/';
    __this.apiRoot = url + 'api/';
    loader = $('#loader');

    $(document).ajaxStart(function() {
      loader.fadeIn(200);
    }).ajaxStop(function() {
      loader.stop().fadeOut(200);
    });
  };

  /*
   * add history state
   */
  this.pushHistoryState = function(param) {
    if (!('history' in window)) {
      return;
    }
    
    if (param.title) {
      window.document.title = param.title + ' Â« ' + this.appName;
    }
    else {
      window.document.title = this.appName;
    }

    // $('header small').text(title);

    if (param.url) {
      if (param.url == window.location.href || param.replace) {
        window.history.replaceState(param.data || null, null, param.url);
        if (param.onReplace) param.onReplace();
      }
      else {
        window.history.pushState(param.data || null, null, param.url);
        if (param.onPush) param.onPush();
      }
    }
  };

  /*
   * perform an ajax request with cache in session storage
   */
  this.cachedRequest = function(param) {
    if ('sessionStorage' in window) {
      var result = window.sessionStorage[ param.id ];
      if (result != undefined) {
        param.success(JSON.parse(result));
        return;
      }
    }
    
    $.ajax({
      url: __this.apiRoot + param.url,
      type: param.type || 'GET',
      dataType: 'json',
      data: param.data || {},
      success: function(result) {
        if (result.stat == 'ok') {
          param.success(result);
          if ('sessionStorage' in window) {
            window.sessionStorage[ param.id ] = JSON.stringify(result);
          }
        }
        else {
          if (param.error) {
            param.error(result);
          }
        }
      },
      error: function(xhr, text, error) {
        if (param.fail) {
          param.fail(xhr, text, error);
        }
      }
    });
  };
};