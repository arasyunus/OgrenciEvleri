var simpleUploader = {
    
    createXHR: function(){
        if (typeof XMLHttpRequest != "undefined"){
                return new XMLHttpRequest();
            }else if (typeof ActiveXObject != "undefined"){
                if (typeof arguments.callee.activeXString != "string"){
                var versions = ["MSXML2.XMLHttp.6.0", "MSXML2.XMLHttp.3.0","MSXML2.XMLHttp"],
                i, len;
                for (i=0,len=versions.length; i < len; i++){
                    try {
                        new ActiveXObject(versions[i]);
                        arguments.callee.activeXString = versions[i];
                        break;
                    } catch (ex){
                        //skip
                    }
                }
            }
            return new ActiveXObject(arguments.callee.activeXString);
        }else{
            throw new Error("No XHR object available.");
        }
    },
    eventsHandlers: function(){
        var thisObj = this;
        if(thisObj.options.dropZone !== undefined){
            thisObj.options.dropZone.ondrop = function(e){
                e.preventDefault();
                if(thisObj.options.dragClases !== undefined && thisObj.options.dragClases.dropClass !== undefined){
                        this.className = thisObj.options.dragClases.dropClass;
                }
                    //Upload start function trigger.
                if(e.dataTransfer.files !== undefined){
                    thisObj.options.files = e.dataTransfer.files;
                    thisObj.ajax(thisObj.getFormData(thisObj.options.files));
                }
            };
        }

        thisObj.eventUtility.addEvent(thisObj.options.standartUploadButton,"click",function(e){
            var standartFiles = thisObj.options.standartFileInput.files;
            e.preventDefault();
            //Upload start function trigger.
            if(standartFiles !== undefined){
                thisObj.options.files = standartFiles;
                thisObj.ajax(thisObj.getFormData(thisObj.options.files));
            }
        });
        if(thisObj.options.dropZone !== undefined){
            thisObj.options.dropZone.ondragover = function(){
                if(thisObj.options.dragClases !== undefined && thisObj.options.dragClases.hoverClass !== undefined){
                    this.className = thisObj.options.dragClases.hoverClass;
                }
                return false;
            };
        }
        if(thisObj.options.dropZone !== undefined){
            thisObj.options.dropZone.ondragleave = function(){
                if(thisObj.options.dragClases !== undefined && thisObj.options.dragClases.leaveClass !== undefined){
                    this.className = thisObj.options.dragClases.leaveClass;
                }
                return false;
            };
        };
    },
    ajax: function(data){
        var thisObj = this;
        var xmlhttp = thisObj.createXHR();
        var uploaded;
        
        thisObj.eventUtility.addEvent(xmlhttp, "readystatechange",function(){
            
            if(this.readyState === 1){
                if(typeof thisObj.options.prepareUpload === 'function'){
                    thisObj.options.prepareUpload();
                }
            }
            
            if(this.readyState === 4){
                if((xmlhttp.status >= 200 && xmlhttp.status < 300) || xmlhttp.status == 304){
                    uploaded = JSON.parse(this.response);
                    if(typeof thisObj.options.finished === 'function'){
                        thisObj.options.finished(uploaded);
                    }
                }else{
                    if(typeof thisObj.options.error === 'function'){
                        thisObj.options.error("There was an ERROR! " + xmlhttp.status);
                    }
                }
            }
        });
        thisObj.eventUtility.addEvent(xmlhttp.upload, "progress",function(e){
            var percent;
            if(e.lengthComputable === true){
                percent = Math.round((e.loaded / e.total) * 100);
            }
            thisObj.setProgress(percent);
        });
        
        if(thisObj.options.processor === undefined){
            console.log("Processor of PHP Server-Side Script undefined!");
        }else{
            xmlhttp.open("post",thisObj.options.processor,true);
            xmlhttp.send(data);
        }
    },
    
    getFormData: function(source){
        var thisObj = this;
        var data = new FormData();
        for(var i = 0 ; i < source.length ; i++){
            data.append('files[]',source[i]);
        }
        if(thisObj.options.mimeTypes === undefined){
             thisObj.options.mimeTypes = ["jpg","png","mp4","pdf","rar","zip"];
        }
        switch(typeof thisObj.options.mimeTypes){
            case "object":
                if(Array.isArray(thisObj.options.mimeTypes)){
                    data.append('allowExt',thisObj.options.mimeTypes);
                }else{
                    if(typeof thisObj.options.error === 'function'){
                        thisObj.options.error("Mimetypes is an array or string value!!");
                    }
                }
            break;
            case "string":
                data.append('allowExt',thisObj.options.mimeTypes);
            break;
            default:
                if(typeof thisObj.options.error === 'function'){
                    thisObj.options.error("Mimetypes is an array or string value!!");
                }
            break;
        }
        return data;
    },

    setProgress: function(progress){
        var thisObj = this;
        if(thisObj.options.progressBar !== undefined){
            thisObj.options.progressBar.style.width = progress ? progress + "%" : 0;
        }
        if(thisObj.options.progressText !== undefined){
            thisObj.options.progressText.textContent = progress ? progress + "%" : 0;
        }
    },

    uploader: function(options){
        var thisObj = this;
        thisObj.options = options;
        thisObj.eventsHandlers();
    },
    options:{
        files: undefined,
        progressBar: undefined,
        progressText: undefined,
        processor: undefined,
        dropZone: undefined,
        standartUploadButton: undefined,
        standartFileInput: undefined,
        dragClases: {
            hoverClass: "upload-console-drop hover",
            leaveClass: "upload-console-drop",
            dropClass: "upload-console-drop drop"
        }
    },
    
    eventUtility: {
	addEvent: (function(){
		if(typeof addEventListener !== "undefined"){
			return function(obj, evt, fn){
				obj.addEventListener(evt, fn, false);
			};
		}
		else{
			return function(obj, evt, fn){
				obj.attachEvent("on" + evt, fn);
			};
		}
	}()),
	removeEvent: (function(){
		if(typeof removeEventListener !== "undefined"){
			return function(obj, evt, fn){
				obj.removeEventListener(evt, fn, false);
			};
		}
		else{
			return function(obj, evt, fn){
				obj.detachEvent("on" + evt, fn);
			};
		}
	}()),
	getTarget: (function(){
		if(typeof addEventListener !== "undefined"){
			return function(evt){
				return evt.target;
			};
		}
		else{
			return function(evt){
				return evt.srcElement;
			};
		}
	}()),
	preventDefault: (function(){
		if(typeof addEventListener !== "undefined"){
			return function(evt){
				evt.preventDefault();
			};
		}
		else{
			return function(evt){
				evt.returnValue = false;
			};
		}
	}()),
}
}