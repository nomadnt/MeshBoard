$(document).ready(function(){});

Array.prototype.first = function(){
    return this[0];
};

String.prototype.sanitize = function(){
    if(this.indexOf('.')){
        var _el = null;
        $.each(this.split('.'), function(i, e){
            _el = (i == 0) ? _el = e : _el = _el + '[' + e + ']';
        });
        el = _el;
    }
    return _el;
}