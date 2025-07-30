<div class="newsletter-form">
    <div class="newsletter-form-container">

    <style>
#_form_7_ {
  padding: 2rem;
}

#_form_7_ input[type="text"] {
  padding: 0.5rem 1rem;
  font-size: 0.875rem;
  border: none;
}

.form-error {
  color: #dc3545;
  font-size: 0.875rem;
  margin-top: 0.5rem;
}

.submit-button {
  transition: opacity 0.3s ease;
}

.submit-button:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}
</style>

<form method="POST" action="https://opendrives.activehosted.com/proc.php" id="_form_7_" class="_form _form_7 _inline-form _dark" novalidate data-styles-version="3">
  <input type="hidden" name="u" value="7" />
  <input type="hidden" name="f" value="7" />
  <input type="hidden" name="s" />
  <input type="hidden" name="c" value="0" />
  <input type="hidden" name="m" value="0" />
  <input type="hidden" name="act" value="sub" />
  <input type="hidden" name="v" value="2" />
  <input type="hidden" name="or" value="1a93735b12074643be3e601875911187" />
  
  <div class="_form-content">
    <div class="_form_element _x92125302 _full_width _clear">
      <div class="_form-title">
        Get the latest from OpenDrives
      </div>
    </div>
    
    <div class="field-container">
      <div class="_form_element _x24474064 _full_width email-input">
        <div class="_field-wrapper">
          <input type="email" id="email" name="email" placeholder="Enter your email address" required/>
        </div>
      </div>
      
      <div class="_button-wrapper _full_width cta">
        <button id="_form_7_submit" class="_submit btn white-outline submit-button" type="submit">
          Sign Up
        </button>
      </div>
    </div>

    <div class="_clear-element"></div>
  </div>
  
  <div class="_form-thank-you" style="display:none;"></div>
</form>

<script type="text/javascript">
// Fix for the timestamp function error
(function() {
    // Create a dummy g-recaptcha-response element to prevent errors
    if (!document.getElementById('g-recaptcha-response')) {
        var dummyElement = document.createElement('textarea');
        dummyElement.id = 'g-recaptcha-response';
        dummyElement.name = 'g-recaptcha-response';
        dummyElement.style.display = 'none';
        document.body.appendChild(dummyElement);
    }
    
    // Override the problematic timestamp function
    if (typeof window.timestamp === 'function') {
        var originalTimestamp = window.timestamp;
        window.timestamp = function() {
            try {
                var response = document.getElementById("g-recaptcha-response");
                if (response == null || response.value.trim() == "") {
                    var captchaSettings = document.getElementsByName("captcha_settings");
                    if (captchaSettings.length > 0) {
                        var elems = JSON.parse(captchaSettings[0].value);
                        elems["ts"] = JSON.stringify(new Date().getTime());
                        captchaSettings[0].value = JSON.stringify(elems);
                    }
                }
            } catch (error) {
                // Silently handle errors to prevent console spam
                console.log('reCAPTCHA timestamp function executed safely');
            }
        };
    }
})();

// Global variables
window.cfields = [];
window.recaptchaResponse = null;
window.formSubmitted = false;
window.recaptchaLoaded = false;

// reCAPTCHA v3 initialization
window.initRecaptcha = function() {
    if (typeof grecaptcha !== 'undefined' && !window.recaptchaLoaded) {
        window.recaptchaLoaded = true;
        console.log('reCAPTCHA v3 loaded successfully');
    }
};

// Execute reCAPTCHA when form is submitted
window.executeRecaptcha = function() {
    return new Promise((resolve, reject) => {
        if (typeof grecaptcha === 'undefined') {
            reject('reCAPTCHA not loaded');
            return;
        }
        
        // Get the appropriate site key
        var hostname = window.location.hostname;
        var siteKey = '6LcwIw8TAAAAACP1ysM08EhCgzd6q5JAOUR1a0Go'; // Default to production key
        
        grecaptcha.ready(function() {
            grecaptcha.execute(siteKey, {action: 'newsletter_signup'})
            .then(function(token) {
                window.recaptchaResponse = token;
                // Update the dummy element with the token
                var responseElement = document.getElementById('g-recaptcha-response');
                if (responseElement) {
                    responseElement.value = token;
                }
                resolve(token);
            })
            .catch(function(error) {
                console.error('reCAPTCHA execution failed:', error);
                reject(error);
            });
        });
    });
};

// Thank you message handler
window._show_thank_you = function(id, message, trackcmp_url, email) {
    try {
        var form = document.getElementById('_form_' + id + '_');
        var thank_you = form.querySelector('._form-thank-you');
        var form_content = form.querySelector('._form-content');
        
        if (form_content) form_content.style.display = 'none';
        if (thank_you) {
            thank_you.innerHTML = message || 'Thank you for subscribing!';
            thank_you.style.display = 'block';
        }
        
        // Handle visitor tracking
        const vgoAlias = typeof visitorGlobalObjectAlias === 'undefined' ? 'vgo' : visitorGlobalObjectAlias;
        var visitorObject = window[vgoAlias];
        if (email && typeof visitorObject !== 'undefined') {
            visitorObject('setEmail', email);
            visitorObject('update');
        } else if (typeof(trackcmp_url) !== 'undefined' && trackcmp_url) {
            _load_script(trackcmp_url);
        }
        
        if (typeof window._form_callback !== 'undefined') {
            window._form_callback(id);
        }
    } catch (error) {
        console.error('Error in _show_thank_you:', error);
    }
};

// Error handler
window._show_error = function(id, message, html) {
    try {
        var form = document.getElementById('_form_' + id + '_');
        if (!form) return;
        
        var err = document.createElement('div');
        var button = form.querySelector('button');
        var old_error = form.querySelector('._form_error');
        
        if (old_error) old_error.parentNode.removeChild(old_error);
        
        err.innerHTML = message || 'An error occurred. Please try again.';
        err.className = '_error-inner _form_error _no_arrow form-error';
        
        var wrapper = document.createElement('div');
        wrapper.className = '_form-inner';
        wrapper.appendChild(err);
        
        if (button && button.parentNode) {
            button.parentNode.insertBefore(wrapper, button);
        }
        
        var submitButton = form.querySelector('[id^="_form"][id$="_submit"]');
        if (submitButton) {
            submitButton.disabled = false;
            submitButton.classList.remove('processing');
        }
        
        if (html) {
            var div = document.createElement('div');
            div.className = '_error-html';
            div.innerHTML = html;
            err.appendChild(div);
        }
    } catch (error) {
        console.error('Error in _show_error:', error);
    }
};

// Script loader with better error handling
window._load_script = function(url, callback, isSubmit) {
    try {
        var head = document.querySelector('head');
        var script = document.createElement('script');
        var r = false;
        var submitButton = document.querySelector('#_form_7_submit');
        
        script.type = 'text/javascript';
        script.charset = 'utf-8';
        script.src = url;
        
        if (callback) {
            script.onload = script.onreadystatechange = function() {
                if (!r && (!this.readyState || this.readyState === 'complete')) {
                    r = true;
                    callback();
                }
            };
        }
        
        script.onerror = function() {
            console.error('Failed to load script:', url);
            if (isSubmit && submitButton) {
                _show_error("7", "Sorry, your submission failed. Please try again.");
                submitButton.disabled = false;
                submitButton.classList.remove('processing');
            }
        };
        
        head.appendChild(script);
    } catch (error) {
        console.error('Error in _load_script:', error);
    }
};

// Main form initialization
(function() {
    try {
        if (window.location.search.search("excludeform") !== -1) return false;
        
        var form_to_submit = document.getElementById('_form_7_');
        if (!form_to_submit) {
            console.error('Form not found');
            return false;
        }
        
        var allInputs = form_to_submit.querySelectorAll('input, select, textarea');
        var tooltips = [];
        var submitted = false;

        // Utility functions
        var addEvent = function(element, event, func) {
            if (element && element.addEventListener) {
                element.addEventListener(event, func);
            } else if (element) {
                var oldFunc = element['on' + event];
                element['on' + event] = function() {
                    if (oldFunc) oldFunc.apply(this, arguments);
                    func.apply(this, arguments);
                };
            }
        };

        var getUrlParam = function(name) {
            try {
                var params = new URLSearchParams(window.location.search);
                return params.get(name) || false;
            } catch (error) {
                console.error('Error getting URL param:', error);
                return false;
            }
        };

        // Field validation
        var validate_field = function(elem, remove) {
            if (!elem) return true;
            
            var tooltip = null;
            var value = elem.value;
            var no_error = true;
            
            if (remove) remove_tooltip(elem);
            if (elem.type !== 'checkbox') {
                elem.className = elem.className.replace(/ ?_has_error ?/g, '');
            }
            
            if (elem.getAttribute('required') !== null) {
                if (elem.type === 'radio' || (elem.type === 'checkbox' && /any/.test(elem.className))) {
                    var elems = form_to_submit.elements[elem.name];
                    if (!(elems instanceof NodeList || elems instanceof HTMLCollection) || elems.length <= 1) {
                        no_error = elem.checked;
                    } else {
                        no_error = false;
                        for (var i = 0; i < elems.length; i++) {
                            if (elems[i].checked) no_error = true;
                        }
                    }
                    if (!no_error) {
                        tooltip = create_tooltip(elem, "Please select an option.");
                    }
                } else if (elem.type === 'checkbox') {
                    var elems = form_to_submit.elements[elem.name];
                    var found = false;
                    var err = [];
                    no_error = true;
                    
                    for (var i = 0; i < elems.length; i++) {
                        if (elems[i].getAttribute('required') === null) continue;
                        if (!found && elems[i] !== elem) return true;
                        found = true;
                        elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
                        if (!elems[i].checked) {
                            no_error = false;
                            elems[i].className = elems[i].className + ' _has_error';
                            err.push("Checking " + elems[i].value + " is required");
                        }
                    }
                    if (!no_error) {
                        tooltip = create_tooltip(elem, err.join('<br/>'));
                    }
                } else if (elem.tagName === 'SELECT') {
                    var selected = true;
                    if (elem.multiple) {
                        selected = false;
                        for (var i = 0; i < elem.options.length; i++) {
                            if (elem.options[i].selected) {
                                selected = true;
                                break;
                            }
                        }
                    } else {
                        for (var i = 0; i < elem.options.length; i++) {
                            if (elem.options[i].selected && (!elem.options[i].value || (elem.options[i].value.match(/\n/g)))) {
                                selected = false;
                            }
                        }
                    }
                    if (!selected) {
                        elem.className = elem.className + ' _has_error';
                        no_error = false;
                        tooltip = create_tooltip(elem, "Please select an option.");
                    }
                } else if (value === undefined || value === null || value === '') {
                    elem.className = elem.className + ' _has_error';
                    no_error = false;
                    tooltip = create_tooltip(elem, "This field is required.");
                }
            }
            
            if (no_error && elem.name === 'email') {
                if (!value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    elem.className = elem.className + ' _has_error';
                    no_error = false;
                    tooltip = create_tooltip(elem, "Enter a valid email address.");
                }
            }
            
            if (tooltip) resize_tooltip(tooltip);
            return no_error;
        };

        // Tooltip functions
        var remove_tooltips = function() {
            for (var i = 0; i < tooltips.length; i++) {
                if (tooltips[i].tip && tooltips[i].tip.parentNode) {
                    tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
                }
            }
            tooltips = [];
        };

        var remove_tooltip = function(elem) {
            for (var i = 0; i < tooltips.length; i++) {
                if (tooltips[i].elem === elem) {
                    if (tooltips[i].tip && tooltips[i].tip.parentNode) {
                        tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
                    }
                    tooltips.splice(i, 1);
                    return;
                }
            }
        };

        var create_tooltip = function(elem, text) {
            var tooltip = document.createElement('div');
            var arrow = document.createElement('div');
            var inner = document.createElement('div');
            var new_tooltip = {};
            
            if (elem.type !== 'radio' && elem.type !== 'checkbox') {
                tooltip.className = '_error';
                arrow.className = '_error-arrow';
                inner.className = '_error-inner';
                inner.innerHTML = text;
                tooltip.appendChild(arrow);
                tooltip.appendChild(inner);
                elem.parentNode.appendChild(tooltip);
            } else {
                tooltip.className = '_error-inner _no_arrow';
                tooltip.innerHTML = text;
                elem.parentNode.insertBefore(tooltip, elem);
                new_tooltip.no_arrow = true;
            }
            new_tooltip.tip = tooltip;
            new_tooltip.elem = elem;
            tooltips.push(new_tooltip);
            return new_tooltip;
        };

        var resize_tooltip = function(tooltip) {
            if (!tooltip || !tooltip.elem) return;
            
            var rect = tooltip.elem.getBoundingClientRect();
            var doc = document.documentElement;
            var scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0));
            
            if (scrollPosition < 40) {
                tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
            } else {
                tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
            }
        };

        var resize_tooltips = function() {
            for (var i = 0; i < tooltips.length; i++) {
                if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
            }
        };

        // Form validation
        var needs_validate = function(el) {
            if (!el) return false;
            
            if (el.getAttribute('required') !== null) {
                return true;
            }
            if (el.name === 'email' && el.value !== "") {
                return true;
            }
            return false;
        };

        var validate_form = function(e) {
            var no_error = true;
            
            if (!submitted) {
                submitted = true;
                for (var i = 0, len = allInputs.length; i < len; i++) {
                    var input = allInputs[i];
                    if (needs_validate(input)) {
                        if (input.type === 'text' || input.type === 'email' || input.type === 'number') {
                            addEvent(input, 'blur', function() {
                                this.value = this.value.trim();
                                validate_field(this, true);
                            });
                            addEvent(input, 'input', function() {
                                validate_field(this, true);
                            });
                        } else if (input.type === 'radio' || input.type === 'checkbox') {
                            (function(el) {
                                var radios = form_to_submit.elements[el.name];
                                for (var i = 0; i < radios.length; i++) {
                                    addEvent(radios[i], 'click', function() {
                                        validate_field(el, true);
                                    });
                                }
                            })(input);
                        } else if (input.tagName === 'SELECT') {
                            addEvent(input, 'change', function() {
                                validate_field(this, true);
                            });
                        }
                    }
                }
            }
            
            remove_tooltips();
            
            for (var i = 0, len = allInputs.length; i < len; i++) {
                var elem = allInputs[i];
                if (needs_validate(elem)) {
                    if (elem.tagName.toLowerCase() !== "select") {
                        elem.value = elem.value.trim();
                    }
                    if (!validate_field(elem)) {
                        no_error = false;
                    }
                }
            }
            
            if (!no_error && e) {
                e.preventDefault();
            }
            
            resize_tooltips();
            return no_error;
        };

        // Event listeners
        addEvent(window, 'resize', resize_tooltips);
        addEvent(window, 'scroll', resize_tooltips);

        // Form serialization
        var _form_serialize = function(form) {
            if (!form || form.nodeName !== "FORM") {
                return '';
            }
            
            var q = [];
            for (var i = 0; i < form.elements.length; i++) {
                var element = form.elements[i];
                if (element.name === "") continue;
                
                switch (element.nodeName) {
                    case "INPUT":
                        switch (element.type) {
                            case "text":
                            case "email":
                            case "number":
                            case "hidden":
                            case "password":
                            case "button":
                            case "reset":
                            case "submit":
                                q.push(element.name + "=" + encodeURIComponent(element.value));
                                break;
                            case "checkbox":
                            case "radio":
                                if (element.checked) {
                                    q.push(element.name + "=" + encodeURIComponent(element.value));
                                }
                                break;
                        }
                        break;
                    case "TEXTAREA":
                        q.push(element.name + "=" + encodeURIComponent(element.value));
                        break;
                    case "SELECT":
                        switch (element.type) {
                            case "select-one":
                                q.push(element.name + "=" + encodeURIComponent(element.value));
                                break;
                            case "select-multiple":
                                for (var j = 0; j < element.options.length; j++) {
                                    if (element.options[j].selected) {
                                        q.push(element.name + "=" + encodeURIComponent(element.options[j].value));
                                    }
                                }
                                break;
                        }
                        break;
                }
            }
            return q.join("&");
        };

        // Form submission
        var form_submit = function(e) {
            e.preventDefault();
            
            if (validate_form(e)) {
                var submitButton = e.target.querySelector('#_form_7_submit');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.classList.add('processing');
                }
                
                        // Execute invisible reCAPTCHA or submit without it if not available
        if (typeof grecaptcha !== 'undefined' && window.recaptchaLoaded && typeof grecaptcha.execute === 'function') {
            executeRecaptcha()
            .then(function(token) {
                var serialized = _form_serialize(document.getElementById('_form_7_'));
                var err = form_to_submit.querySelector('._form_error');
                if (err) err.parentNode.removeChild(err);
                
                // Add reCAPTCHA response
                serialized += "&g-recaptcha-response=" + encodeURIComponent(token);
                serialized = serialized.replace(/%0A/g, '\\n');
                
                _load_script('https://opendrives.activehosted.com/proc.php?' + serialized + '&jsonp=true', null, true);
            })
            .catch(function(error) {
                console.error('reCAPTCHA failed:', error);
                _show_error("7", "Verification failed. Please try again.");
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('processing');
                }
            });
        } else {
            // Submit without reCAPTCHA if it's not available
            console.log('Submitting form without reCAPTCHA verification');
            var serialized = _form_serialize(document.getElementById('_form_7_'));
            var err = form_to_submit.querySelector('._form_error');
            if (err) err.parentNode.removeChild(err);
            
            serialized = serialized.replace(/%0A/g, '\\n');
            _load_script('https://opendrives.activehosted.com/proc.php?' + serialized + '&jsonp=true', null, true);
        }
            }
            return false;
        };

        addEvent(form_to_submit, 'submit', form_submit);
        
    } catch (error) {
        console.error('Error initializing form:', error);
    }
})();

// Load reCAPTCHA v3
(function() {
    // Check if reCAPTCHA is already loaded
    if (typeof grecaptcha !== 'undefined') {
        console.log('reCAPTCHA already loaded');
        return;
    }
    
    // Determine the appropriate site key based on environment
    var getSiteKey = function() {
        var hostname = window.location.hostname;
        
        // For localhost/development
        if (hostname === 'localhost' || hostname === '127.0.0.1' || hostname.includes('local')) {
            console.log('Using development environment - reCAPTCHA may not work without proper configuration');
            // You can replace this with a development site key if you have one
            return '6Lf4tJQrAAAAALl-osZDfWYLfXRYngr-JgSjMLQd';
        }
        
        // For production
        return '6LcwIw8TAAAAACP1ysM08EhCgzd6q5JAOUR1a0Go';
    };
    
    // Try to load reCAPTCHA with better error handling
    var loadRecaptcha = function() {
        try {
            // Check if we're in a secure context (HTTPS)
            if (location.protocol !== 'https:' && location.hostname !== 'localhost' && location.hostname !== '127.0.0.1') {
                console.warn('reCAPTCHA requires HTTPS. Form will work without verification.');
                window.recaptchaLoaded = false;
                return;
            }
            
            var siteKey = getSiteKey();
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://www.google.com/recaptcha/api.js?render=' + siteKey;
            script.async = true;
            script.defer = true;
            
            // Set a timeout to handle slow loading
            var timeout = setTimeout(function() {
                console.warn('reCAPTCHA loading timed out. Form will work without verification.');
                window.recaptchaLoaded = false;
            }, 10000); // 10 second timeout
            
            script.onload = function() {
                clearTimeout(timeout);
                console.log('reCAPTCHA v3 loaded successfully');
                window.recaptchaLoaded = true;
            };
            
            script.onerror = function() {
                clearTimeout(timeout);
                console.warn('Failed to load reCAPTCHA. Form will work without verification.');
                window.recaptchaLoaded = false;
            };
            
            document.head.appendChild(script);
        } catch (error) {
            console.warn('Error loading reCAPTCHA:', error);
            window.recaptchaLoaded = false;
        }
    };
    
    // Try to load immediately
    loadRecaptcha();
    
    // If it fails, try again after a delay
    setTimeout(function() {
        if (typeof grecaptcha === 'undefined' && !window.recaptchaLoaded) {
            console.log('Retrying reCAPTCHA load...');
            loadRecaptcha();
        }
    }, 2000);
})();
</script>

    </div>
</div>