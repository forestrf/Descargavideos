<?php

//desencriptar cadena base64 de ooyala
function ooyala_decrypt($data){
	$key=hex2bin('4b3d32bed59fb8c54ab8a190d5d147f0e4f0cbe6804c8e0721175ab68b40cb01');
	$iv=hex2bin('00020406080a0c0ea0a2a4a6a8aaacae');
	
	$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($data), MCRYPT_MODE_CBC, $iv);
	$decrypted = pkcs5_unpad($decrypted);
	$decrypted = substr($decrypted, 6);
	
	return gzinflate($decrypted);
}

function pkcs5_pad ($text, $blocksize)
{
	$pad = $blocksize - (strlen($text) % $blocksize);
	return $text . str_repeat(chr($pad), $pad);
}

function pkcs5_unpad($text)
{
	$pad = ord($text{strlen($text)-1});
	if ($pad > strlen($text)) return false;
	if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
	return substr($text, 0, -1 * $pad);
}

// Tracear: flash
/*
findpropstrict Qname(PackageNamespace(""),"trace")
getlocal 6
callpropvoid Qname(PackageNamespace(""),"trace") 1
*/
// log: C:\Users\{USER}\AppData\Roaming\Macromedia\Flash Player\Logs\flashlog.txt
	
// flash
/*
package com.ooyala.player.crypto
{
	import flash.utils.ByteArray;
	import com.hurlant.crypto.symmetric.CBCMode;
	import com.ooyala.util.StringUtils;
	import com.hurlant.crypto.symmetric.AESKey;
	import com.hurlant.crypto.symmetric.PKCS5;

	final class OoyalaCryptoKey extends Object
	{

		function OoyalaCryptoKey()
		{
			super();
		}

		static const IV:ByteArray = StringUtils.hexToArray("00020406080a0c0ea0a2a4a6a8aaacae");

		static const CIPHER:CBCMode = new CBCMode(new AESKey(StringUtils.hexToArray("4b3d32bed59fb8c54ab8a190d5d147f0e4f0cbe6804c8e0721175ab68b40cb01")),new PKCS5(16));
	}
}

-------------------------------------------------------------------------------

package com.ooyala.player.crypto
{
	public function ooyalaDecrypt(param1:String, param2:Boolean = false) : String
	{
		var _loc4_:ByteArray = null;
		var _loc5_:uint = 0;
		var _loc7_:uint = 0;
		Log.v3("|" + param1 + "|");
		var _loc3_:ByteArray = Base64.decode64(StringUtils.trim(param1));
		OoyalaCryptoKey.CIPHER.IV = OoyalaCryptoKey.IV;
		OoyalaCryptoKey.CIPHER.decrypt(_loc3_);
		if(param2)
		{
			_loc3_.endian = Endian.BIG_ENDIAN;
			_loc3_.position = 0;
			_loc7_ = _loc3_.readUnsignedInt(); // leer 32 bits (se mueve el puntero)
			_loc4_ = new ByteArray();
			_loc3_.readBytes(_loc4_,0,_loc7_);
			_loc4_.uncompress(); // descomprimir usando zlib
		}
		else
		{
			_loc4_ = _loc3_;
		}
		_loc4_.position = 16;
		_loc5_ = _loc4_.bytesAvailable;
		var _loc6_:String = _loc4_.readUTFBytes(_loc5_);
		return _loc6_;
	}
}

-------------------------------------------------------------------------------

package com.ooyala.player.crypto
{
	public function ooyalaEncrypt(param1:String, param2:Boolean = true, param3:Date = null, param4:Number = -1) : String
	{
		var param3:Date = param3 || new Date();
		var param4:Number = param4 < 0?Math.random():param4;
		var _loc5_:* = "aThjk|" + param3.time.toString(28) + "|-|" + param4.toString() + "|";
		var _loc6_:String = Sha256.sha256(StringUtils.toByteArray(_loc5_)).slice(0,16);
		var _loc7_:ByteArray = StringUtils.toByteArray(_loc6_ + param1);
		OoyalaCryptoKey.CIPHER.IV = OoyalaCryptoKey.IV;
		OoyalaCryptoKey.CIPHER.encrypt(_loc7_);
		var _loc8_:String = Base64.encode64(_loc7_);
		var _loc9_:RegExp = new RegExp("/","g");
		if(param2)
		{
			return _loc8_.replace(_loc9_,"_").replace(new RegExp("\\+","g"),"-").replace(new RegExp("\\=","g"),"*");
		}
		return _loc8_;
	}
}
*/
