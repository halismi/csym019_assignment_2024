            //Requesting info
            function loadinfo(){
                // create a new XMLHttpRequest object
                var request = new XMLHttpRequest();
                // open a connection
                request.open("GET","test_json.json", true);
                // send the request
                request.send();
            // handle the response
            request.onreadystatechange = function (){
                if(this.readyState === 4 && this.status === 200){
                    console.log(this.responseText);
                }
            };
            }
            
