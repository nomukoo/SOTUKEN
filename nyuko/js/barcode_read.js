    var inputTextArray;
    var text = "";
    var array = [];　
    var tmparray = [];
    document.onkeydown = function(e) {
        if(e.key == " " || e.key == "Enter"){
            if(text.indexOf('Hankaku',0) !== -1) {
                text = text.substr(0,6);
            }
            array.push(text);
            tmparray.push(text);
            text = "";
            var str = "";
            str = "<tr>";
            if(e.key == "Enter"){
  	            for (let i = 0; i < tmparray.length; i++) {
        	        str += "<td>";
		            str += tmparray[i];
        	        str += "</td>";
		         }
	        str += "</tr>";
        
            $('table tbody').append(str);
            inputTextArray = array;
            tmparray.length = 0;
        }
        } else {
        text += e.key;
        }
    }