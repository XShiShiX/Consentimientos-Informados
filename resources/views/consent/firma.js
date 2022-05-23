

function ClearFormData()
{
    document.FORM1.sigRawData.value = "Signature Raw Data: ";
    document.FORM1.sigImageData.value = "Signature Image Data: ";
}

var imgWidth;
var imgHeight;

function StartSign()
{
    console.log("Estamos en StartSign()");
    //definición del canvas
    var canvasObj = document.getElementById('cnv');
    canvasObj.getContext('2d').clearRect(0, 0, canvasObj.width, canvasObj.height);
    imgWidth = canvasObj.width;
    imgHeight = canvasObj.height;
    //mensaje que mandaremos con la configuración
    var message = { "firstName": "", "lastName": "", "eMail": "", "location": "", "imageFormat": 1, "imageX": imgWidth, "imageY": imgHeight, "imageTransparency": false, "imageScaling": false, "maxUpScalePercent": 0.0, "rawDataFormat": "ENC", "minSigPoints": 25, "penThickness": 2, "penColor": "#000000" };
    //cuando haya un evento 'SigCaptureWeb_SignResponse' -&gt; lanza función SignResponse()
    document.addEventListener('SigCaptureWeb_SignResponse', SignResponse, false);
    //crea un elemento html con tagname 'SigCaptureWeb_ExtnDataElem' y lo guarda en element
    var element = document.createElement("SigCaptureWeb_ExtnDataElem");
    //le pone al elemento el messageData como atributo pasado a Json
    element.setAttribute("SigCaptureWeb_MsgAttribute", JSON.stringify(message) );
    //agrega el nuevo elemento a nuestro documento
    document.documentElement.appendChild(element);
    //se crea el evento 'Events' //eventos básicos
    var evt = document.createEvent("Events");
    //da valor inicial al evento creado por createEvent()
    evt.initEvent("SigCaptureWeb_SignStartEvent", true, false);
    console.log('-lanzamos el evento');
    //lanza el evento
    element.dispatchEvent(evt);
}


function SignResponse(event)
{
    console.log("Tenemos respuesta ...");
    //coge los atributos de 'SigCaptureWeb_msgAttri'
    var str = event.target.getAttribute("SigCaptureWeb_msgAttri");
    //convierte el Json en un objeto
    var obj = JSON.parse(str);
    console.log("atributo SignCaptureWeb_msgAttri :")
    //console.log("%o",obj);
    //definimos canvas
    var ctx = document.getElementById('cnv').getContext('2d');
    //cogemos datos de respuesta obj
    if (obj.errorMsg != null &amp;&amp; obj.errorMsg!=="" &amp;&amp; obj.errorMsg!=="undefined")
    {
        alert(obj.errorMsg);
    }
    //si no da error
    else
    {
        //el objeto tiene isSigned
        if (obj.isSigned)
        {
            //Image
            const img = new Image();
            img.onload = function ()
            {
                ctx.drawImage(img, 0,0, imgWidth, imgHeight );
            }
            img.src = "data:image/png;base64," + obj.imageData;
            //tambien tenemos
            //obj.rawData;
        }
    }
}
