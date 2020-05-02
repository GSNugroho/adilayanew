/**
 *
 * @author Raymond Sugiarto
 * @since  Jul 29, 2016
 */
var typingTimer;
if (typeof ltype === 'undefined') {
    var ltype = 'def';
}

$(function () {
    jQuery('input.icheck').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    //Check to see if the window is top if not then display button
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollToTop').fadeIn();
            jQuery('.scroll-to-top').fadeIn();
        } else {
            jQuery('.scrollToTop').fadeOut();
            jQuery('.scroll-to-top').fadeOut();
        }
    });
    //Click event to scroll to top
    jQuery('.scroll-to-top').click(function () {
        jQuery('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

});

(function ($, window, document) {
    $.wapp = {
        options: {
            imgLoading: base_url + "assets/img/loading.gif",
            doneTypingInterval: 1000,
        },
        showLoading: function (target, append) {
            var fullBody = false;
            if (typeof target === typeof undefined) {
                fullBody = true;
            }
            var isAppend = true;
            if (typeof append === typeof undefined) {
                isAppend = false;
            } 
            else {
                isAppend = append;
            }

            if (fullBody) {
                if (jQuery('#backdropLoading').length > 0) {
                    jQuery('#backdropLoading').remove();
                }
                var loadingScreen = '<div id="backdropLoading" class="modal fade in">'
                        + '<img src="' + this.options.imgLoading + '" class="wapp-loading"/>'
                        + '</div>';
                if (ltype == 'l-overlay') {
                    $.LoadingOverlay("show");
                }
                else {
                    jQuery('body').append(loadingScreen);
                }
            } else {
                var obj;
                if (target instanceof jQuery) {
                    obj = target;
                } 
                else {
                    obj = jQuery(target);
                }
                if (ltype == 'l-overlay') {
                    obj.LoadingOverlay("show");
                }
                else {
                    if (isAppend) {
                        obj.append('<div class="bg-loading"><img src="' + this.options.imgLoading + '" class="wapp-loading"/></div>');
                    } 
                    else {
                        obj.html('<div class="bg-loading"><img src="' + this.options.imgLoading + '" class="wapp-loading"/></div>');
                    }
                }
            }
        },
        hideLoading: function (target) {
            var fullBody = false;
            if (typeof target === typeof undefined) {
                fullBody = true;
            }
            if (fullBody) {
                if (ltype == 'l-overlay') {
                    $.LoadingOverlay("hide");
                }
                else {
                    if (jQuery('#backdropLoading').length > 0) {
                        jQuery('#backdropLoading').hide();
                    }
                }
            } 
            else {
                var obj;
                if (target instanceof jQuery) {
                    obj = target;
                } 
                else {
                    obj = jQuery(target);
                }
                if (ltype == 'l-overlay') {
                    obj.LoadingOverlay("hide");
                }
                else {
                    obj.find('.bg-loading').remove();
                }
            }
        },
        progress: function(target, increment){
            var progressBar = jQuery("#" + target + " .progress-bar");
            var val = progressBar.attr("aria-valuenow");
            val = val * 1 + increment * 1;
            progressBar.attr("aria-valuenow", val);
            progressBar.html(val + "%");
            progressBar.css("width", val + "%");
        },
        response: {},
        performed: {},
        helper: {},
        files: {},
        notify: {},
    }

    $.wapp.response = {
    }

    $.wapp.perfomed = {
        submit: function (id, form) {
            if (typeof form === typeof undefined) {
                form = jQuery('#' + id).closest('form');
            }
            
//            console.log($.validate());
            if (form.length > 0) {
                if (form.attr('validation') == '1') {
                    $.wapp.showLoading(form, false);
                    $.validate({
                        form : '#' + form.attr('id'),
                        onSuccess: function(){
                            $.wapp.hideLoading(form, false);
                            form.submit();
                        }
                    });
                }
                else {
                    form.submit();
                }
            } else {
                console.log('no form detected');
            }
        },
        reload: function (obj, url, method, target, callback_success, callback_error) {
            if (typeof CKEDITOR !== 'undefined') {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
            }
            
            var form = obj.closest('form');
            var send_data = form.serialize();
            
            var targetLoading = target;
            if (targetLoading instanceof jQuery || jQuery(targetLoading).length > 0 || jQuery(targetLoading).height > 0) {
                
            }
            else {
                targetLoading = form;
            }
            $.wapp.showLoading(targetLoading, false);
            
            var xhr = null;
            if (xhr != null) {
                xhr.abort();
            }

            xhr = $.ajax({
                type: method,
                dataType: 'json',
                url: url,
                data: send_data,
                success: function (res) {
                    if (target instanceof jQuery || jQuery(target).length > 0) {
                        $.wapp.hideLoading(targetLoading);
                        var obj;
                        if (target instanceof jQuery) {
                            obj = target;
                        } else {
                            obj = jQuery(target);
                        }
                        obj.html(res.html);
                        var js = res.js;
                        if (js.length > 0) {
                            eval(js);
                        }
                    }
                    if (typeof callback_success === 'function') {
                        callback_success(res);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $.wapp.hideLoading(target);
                    var obj;
                    if (target instanceof jQuery) {
                        obj = target;
                    } else {
                        obj = jQuery(target);
                    }
                    obj.html(xhr.responseText);
                    if (typeof callback_error === 'function') {
                        callback_error(xhr);
                    }
                }
            });
            return xhr;
        },
        ajax_submit: function (obj, url, method, target, callback_success, callback_error) {
            var form = obj.closest('form');
            var send_data = form.serialize();
            if (target instanceof jQuery || jQuery(target).length > 0) {
                $.wapp.showLoading(target, true);
            }
            var xhr = null;
            if (xhr != null) {
                xhr.abort();
            }

            xhr = $.ajax({
                type: method,
                dataType: 'json',
                url: url,
                data: send_data,
                success: function (res) {
                    if (target instanceof jQuery || jQuery(target).length > 0) {
                        $.wapp.hideLoading(target);
                        var obj;
                        if (target instanceof jQuery) {
                            obj = target;
                        } else {
                            obj = jQuery(target);
                        }
                        obj.html(res.html);
                        var js = res.js;
                        if (js.length > 0) {
                            eval(js);
                        }
                    }
                    if (typeof callback_success === 'function') {
                        callback_success(res);
                    }
                },
                error: function (res) {
                    $.wapp.hideLoading(target);
                    if (typeof callback_error === 'function') {
                        callback_error(res);
                    }
                }
            });
            return xhr;
        },
        dialog: function (obj, url, method, target, callback_success, callback_error) {
            var form = obj.closest('form');
            var send_data = form.serialize();
            
            var xhr = null;
            if (xhr != null) {
                xhr.abort();
            }
            var modalDialog = jQuery(target);
            var temp = modalDialog;
            modalDialog.find(".modal-content").remove();

            if (ltype == 'l-overlay') {
                if (jQuery(target).length == 0) {
                    modalDialog = jQuery('<div>');
                    if (target.includes('#')) {
                        target = target.replace('#', '');
                        modalDialog.attr('id', target);
                    } else if (target.includes('.')) {
                        target = target.replace('.', '');
                        modalDialog.attr('class', target);
                    }
                }
            }
            else {
                if (jQuery(target).length == 0) {
                    modalDialog = jQuery('<div>');
                    if (target.includes('#')) {
                        target = target.replace('#', '');
                        modalDialog.attr('id', target);
                    } else if (target.includes('.')) {
                        target = target.replace('.', '');
                        modalDialog.attr('class', target);
                    }
                }
            }
            if (jQuery('#backdropDialog').length > 0) {
                jQuery('#backdropDialog').remove();
            }
            modalDialog.addClass('modal-dialog');

            var modalContent = jQuery('<div>');
            modalContent.addClass('modal-content');
            modalContent.append('<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>');


            var modalBody = jQuery('<div>');
            modalBody.addClass('modal-body');
            modalContent.append(modalBody);

            modalDialog.append(modalContent);

            var dialogContainer = jQuery('<div>');
            dialogContainer.attr('id', 'backdropDialog');
            dialogContainer.addClass('modal fade in');
            dialogContainer.append(modalDialog);
            jQuery('body').append(dialogContainer);

            jQuery('.modal-content .close').on("click", function () {
                jQuery('#backdropDialog').hide();
            });
            
//            if (jQuery(target).length > 0) {
//                if (jQuery(target).find(".modal-body").length > 0) {
//                    $.wapp.showLoading(target + " .modal-body");
//                }
//                else {
//                    $.wapp.showLoading(target);
//                }
//            }
            $.wapp.showLoading(modalBody);
            
            xhr = $.ajax({
                type: method,
                dataType: 'json',
                url: url,
                data: send_data,
                success: function (res) {
                    $.wapp.hideLoading(modalBody);
                    modalBody.html(res.html);
                    var js = res.js;
                    if (js.length > 0) {
                        eval(js);
                    }
                    if (typeof callback_success === 'function') {
                        callback_success(res);
                    }
                },
                error: function (res) {
                    $.wapp.hideLoading(target);
                    if (typeof callback_error === 'function') {
                        callback_error(res);
                    }
                }
            });
            return xhr;
        },
        edit_load_data: function (obj, url, method, target, callback_success, callback_error) {
            var form = obj.closest('form');
            var send_data = form.serialize();
            if (jQuery(target).length > 0) {
                $.wapp.showLoading(target, true);
            }
            var xhr = null;
            if (xhr != null) {
                xhr.abort();
            }

            xhr = $.ajax({
                type: method,
                dataType: 'json',
                url: url,
                data: send_data,
                success: function (res) {
                    $.wapp.hideLoading(target);
                    for (var key in res.data) {
                        jQuery("#" + key).val(res.data[key]);
                    }
                    if (typeof callback_success === 'function') {
                        callback_success(res);
                    }
                },
                error: function (res) {
                    $.wapp.hideLoading(target);
                    if (typeof callback_error === 'function') {
                        callback_error(res);
                    }
                }
            });
            return xhr;
        },
        add_row: function (obj, url, method, target, callback_success, callback_error) {
            var form = obj.closest('form');
            var send_data = form.serialize();
            if (jQuery(target).length > 0) {
                $.wapp.showLoading(target, true);
            }
            var xhr = null;
            if (xhr != null) {
                xhr.abort();
            }
//
            xhr = $.ajax({
                type: method,
                dataType: 'json',
                url: url,
                data: send_data,
                success: function (res) {
                    if (jQuery(target).length > 0) {
                        $.wapp.hideLoading(target);
                        jQuery(target).append(res.html);
                        var js = res.js;
                        if (js.length > 0) {
                            eval(js);
                        }
                    }
                    if (typeof callback_success === 'function') {
                        callback_success(res);
                    }
                },
                error: function (res) {
                    $.wapp.hideLoading(target);
                    if (typeof callback_error === 'function') {
                        callback_error(res);
                    }
                }
            });
            return xhr;
        },
    }

    $.wapp.performed = $.wapp.perfomed;

    $.wapp.helper = {
        generate_slug: function (text) {
            return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
        },
        thousand_separator: function(number, places, symbol, thousand, decimal) {
            
            if (typeof number === "undefined") {
                number = "0";
            }
            number = number || 0;
            places = !isNaN(places = Math.abs(places)) ? places : 2;
            symbol = symbol !== undefined ? symbol : "Rp ";
            thousand = thousand || ",";
            decimal = decimal || ".";
            number = number.replace(/[,]/g, '.');
            var negative = number < 0 ? "-" : "",
                i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            var realNumber = number;
            number = number.replace(/[.]/g, decimal);
            return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(realNumber - i).toFixed(places).slice(2) : "");
        },
        remove_thousand_separator: function (number, thousand){
            thousand = thousand || ",";
            
            if (typeof number !== "undefined") {
                if (thousand == '.'){
                    var newNumber = number.replace(/[.]/g, ''); // 12345.99
                    return newNumber;
                }
                else if (thousand == ',') {
                    var newNumber = number.replace(/[,]/g, ''); // 12345.99
                    return newNumber;
                }
            }
            return number;
        },
        lpad: function (n, width, z) {
            z = z || '0';
            n = n + '';
            return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
        },
        fullscreen: function(element){
            var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
                (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
                (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
                (document.msFullscreenElement && document.msFullscreenElement !== null);
        
            if (!isInFullScreen) {
                if(element.requestFullscreen)
                    element.requestFullscreen();
                else if(element.mozRequestFullScreen)
                    element.mozRequestFullScreen();
                else if(element.webkitRequestFullscreen)
                    element.webkitRequestFullscreen();
                else if(element.msRequestFullscreen)
                    element.msRequestFullscreen();
            }
            else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        },
        copy_to_clipboard: function(id){
            var selector = document.querySelector('#' + id)
            selector.select()
            document.execCommand('copy')
        }
    }

    $.wapp.rules = {
        numeric: function (el, minus, allowComma, allowPoint) {
            minus = minus !== undefined ? minus : false;
            allowComma = allowComma !== undefined ? allowComma : false;
            allowPoint = allowPoint !== undefined ? allowPoint : false;
            jQuery(el).keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and , 188                 \\\ .(190)
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 109, 189]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: Ctrl+C
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    // Allow: Ctrl+X
                    (e.keyCode == 88 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                        if (e.keyCode == 109 || e.keyCode == 189) {
                            if (minus) {
                                return;
                            }
                            else {
                                e.preventDefault();
                            }
                        }
                        // let it happen, don't do anything
                        return;
                    }
                if (allowComma && e.keyCode == 188) {
                    return;
                }
                if (allowPoint && e.keyCode == 190) {
                    return;
                }
                    
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        },
        format_thousand_separator: function (el, places, symbol, thousand, decimal) {
            jQuery(el).on('keyup', function (e) {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function(){
                    var oldNumber = $.wapp.helper.remove_thousand_separator(jQuery(el).val(), thousand);
                    var newNumber = $.wapp.helper.thousand_separator(oldNumber, places, symbol, thousand, decimal);
                    jQuery(el).val(newNumber);
                }, $.wapp.options.doneTypingInterval);
            });
            jQuery(el).on('keydown', function (e) {
                clearTimeout(typingTimer);
            });
            jQuery(el).on('focusin', function (e) {
                var oldNumber = $.wapp.helper.remove_thousand_separator(jQuery(el).val(), thousand);
                jQuery(el).val(oldNumber);
            });
            jQuery(el).on('focusout', function (e) {
                clearTimeout(typingTimer);
                var oldNumber = $.wapp.helper.remove_thousand_separator(jQuery(el).val(), thousand);
                var newNumber = $.wapp.helper.thousand_separator(oldNumber, places, symbol, thousand, decimal);
                jQuery(el).val(newNumber);
            });
        },
        'unformat_thousand_separator': function (el) {
            jQuery(el).keydown(function (e) {
                $.wapp.helper.remove_thousand_separator(jQuery(this).val());
            });
        }
    }

    $.wapp.files = {
        filesadded: "",
        loadjscssfile: function(filename, filetype, callback){
            if (filetype == "js"){ //if filename is a external JavaScript file
                var fileref=document.createElement('script')
                fileref.setAttribute("type","text/javascript")
                fileref.setAttribute("src", filename)
            }
            else if (filetype == "css"){ //if filename is an external CSS file
                var fileref=document.createElement("link")
                fileref.setAttribute("rel", "stylesheet")
                fileref.setAttribute("type", "text/css")
                fileref.setAttribute("href", filename)
            }
            if (typeof fileref != "undefined") {
                if (typeof(callback) === 'function') {
//                    fileref.onload = callback();
                    if (fileref.readyState){  //IE
                        fileref.onreadystatechange = function(){
                            if (fileref.readyState == "loaded" ||
                                    fileref.readyState == "complete"){
                                fileref.onreadystatechange = null;
                                callback();
                            }
                        };
                    }
                    else {
                        fileref.onload = function() {
                            callback();
                        }
                    }
                }
                document.getElementsByTagName("head")[0].appendChild(fileref);
            }
        },
        load: function (filename, filetype, callback){
            if ($.wapp.files.filesadded.indexOf("["+filename+"]")==-1){
                $.wapp.files.loadjscssfile(filename, filetype, callback);
                $.wapp.files.filesadded+="["+filename+"]"; //List of files added in the form "[filename1],[filename2],etc"
            }
            else {
                if (typeof(callback) === 'function') {
                    callback();
                }
//                console.log("file already added!");
            }
        },
        base64: {_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=this._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=this._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}},
    }
    
    $.wapp.notify = {
        success: function(message, size) {
            $.notify(message, {position: "right bottom", className: ["success", "notify-" + size]});
        },
        error: function(message, size) {
            $.notify(message, {position: "right bottom", className: ["error", "notify-" + size]});
        }
    }
})(this.jQuery, window, document)

