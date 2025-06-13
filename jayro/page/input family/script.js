 import {config} from "../../../app_config.js"
      document.querySelector("form").addEventListener("submit",event => {
        event.preventDefault();
        const token = document.getElementById("token");    
        
        const formData = new FormData();
        formData.append("token",token.value);
        
        fetch(config["APP_URL "] + "/libs/users/family_share/access.php",{
            method: "POST",
            body: formData
        }).then(value => value.json()).then((respone) => {
            if (respone.action) {
                window.location.href = config["APP_URL "]
            } else {
                alert("TOKEN TIDAK VALID!")
            }
        })
     })