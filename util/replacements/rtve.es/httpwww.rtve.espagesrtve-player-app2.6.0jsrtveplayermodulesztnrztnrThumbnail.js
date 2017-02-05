console.log("Script replaced"); // REPLACED

define(["vendor/jquery"], function(t) {
    "use strict";

    function r(t) {
		console.log(t); // REPLACED
		var e = t.readInt();
		console.log(e); // REPLACED
		var i = t.readChars(4);
		console.log(i); // REPLACED
		var r = [];
        if (t.read(r, 0, e) !== e)
			throw "Out of bounds";
		console.log(r); // REPLACED
        return t.skip(4), {
            type: i,
            data: r
        }
    }

    function i(t) {
        var r, i, e, n;
        for (r = "", i = 0, e = 0, n = 0, i = 0; i < t.length; i++) 0 === n ? (r += t.charAt(i), e = (e + 1) % 4, n = e) : n--;
        return r
    }

    function e(t, r) {
        var i, e, n, s, h, a;
        for (i = "", e = 0, n = 0, s = 3, h = 1, e = 0; e < t.length; e++)
			0 === n ? 
				(a = 10 * parseInt(t.charAt(e)), n = 1) 
				:
				0 === s ?
					(a += parseInt(t.charAt(e)), i += r.charAt(a), s = (h + 3) % 4, n = 0, h++)
					:
					s--;
		console.log(i); // REPLACED
		return i
    }

    function n(t) {
        var r, n, s;
        return s = t.indexOf("#"), n = i(t.substring(0, s)), r = t.substring(s + 1), e(r, n)
    }

    function s(t) {
        this.logger.log("RtvePlayer", "ztnrThumbnail", "function uPlayerShow ()" + t);
        var i, e;
        try {
			var e = new a(t);
			e.skip(8);
			var i;
			do {
				i = r(e);
				console.log(i); // REPLACED
                if ("tEXt" === i.type) {
                    var s = i.data,
                        h = "",
                        o = 0;
                    for (o = 0; o < s.length; o++) 0 !== s[o] && (h += String.fromCharCode(s[o]));
					console.log(h); // REPLACED
					console.log(n(h)); // REPLACED
                    return this.logger.log("RtvePlayer", "ztnrThumbnail", "uPlayerShow URL: [ " + n(h) + "]"), n(h)
                }
            } while ("IEND" !== i.type);
        } catch (u) {
            this.logger.error("RtvePlayer", "ztnrThumbnail", "No se ha podido procesar la img en modeTwo.")
        }
    }

    function h(t, r) {
        return {
            sources: [{
                src: t,
                type: r
            }]
        }
    }
    var a = function(t) {
        var r = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        this.position = 0, this.base64 = t, this.bits = 0, this.bitsLength = 0,
		this.readByte = function() {
            try {
                if (0 === this.bitsLength) {
                    for (var t = 0; this.position < this.base64.length && this.bitsLength < 24;) {
                        var i = this.base64.charAt(this.position);
                        if (++this.position, i > " ") {
                            var e = r.indexOf(i);
                            if (0 > e) throw "Invalid character";
                            if (64 > e) {
                                if (t > 0) throw "Invalid encoding (padding)";
                                this.bits = this.bits << 6 | e
                            } else {
                                if (this.bitsLenght < 8) throw "Invalid encoding (extra)";
                                this.bits <<= 6, t += 6
                            }
                            this.bitsLength += 6
                        }
                    }
                    if (this.position >= this.base64.length) {
                        if (0 === this.bitsLength) return -1;
                        if (this.bitsLength < 24) throw "Invalid encoding (end)"
                    }
                    6 === t ? t = 8 : 12 === t && (t = 16), this.bits = this.bits >> t, this.bitsLength -= t
                }
                this.bitsLength -= 8;
                var n = this.bits >> this.bitsLength & 255;
                return n
            } catch (s) {
                console.error("RtvePlayer", "ztnrThumbnail", "Base64Reader readByte error: " + s.message)
            }
        }, this.read = function(t, r, i) {
            for (var e = 0; i > e;) {
                var n = this.readByte();
                if (-1 === n) return e;
                t[r + e] = n, e++
            }
			console.log(e); // REPLACED
            return e
        }, this.readChar = function() {
            var t = this.readByte();
            return -1 === t ? null : String.fromCharCode(t)
        }, this.readChars = function(t) {
            for (var r = "", i = 0; t > i; i++) {
                var e = this.readChar();
                if (!e) return r;
                r += e
            }
            return r
        }, this.skip = function(t) {
            for (var r = 0; t > r; r++) this.readByte()
        }, this.readInt = function() {
            var t = [];
            if (4 !== this.read(t, 0, 4)) throw "Out of bounds";
            return t[0] << 24 | t[1] << 16 | t[2] << 8 | t[3]
        }
    };
    return {
        load: function(r) {
            var i, e = t.Deferred(),
                n = this;
            this.logger.log("RtvePlayer", "ztnrThumbnail", "idManager=", r);
			console.log(this.options.mediaConfig.ztnrMvlThumbUrl); // REPLACED
            var a = this.options.mediaConfig.ztnrMvlThumbUrl.replace("{idManager}", r);
			console.log(a); // REPLACED
            return this.logger.log("RtvePlayer", "ztnrThumbnail", "ztnrMvlThumbUrl=", a), require(["vendor/text!" + a], function(t) {
				console.log(t); // REPLACED
                var r = s.call(this, t);
				console.log(r); // REPLACED
                this.logger.log("RtvePlayer", "ztnrThumbnail", "src=", r);
                var a = n.utils.getContentType(r);
                "audio/x-mpegurl" === a ? this.m3uParser(r, function(t) {
                    a = n.utils.getContentType(t), i = h(t, a), null === t || "undefined" == typeof t ? e.rejectWith(this, []) : e.resolveWith(this, [i]), this.logger.log("RtvePlayer", "ztnrThumbnail M3UParser", "src=", t)
                }.bind(this)) : (i = h(r, a), null === r || "undefined" == typeof r ? e.rejectWith(this, []) : e.resolveWith(this, [i]))
            }.bind(this)), e.promise()
        }
    }
});