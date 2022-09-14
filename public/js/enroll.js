$(function(){

    
    $("#custom-btn").click(function(){
        $("#customFile").click();
    })

})

const customfile = document.querySelector("#customFile"),
img = document.querySelector("#pro-image");

customfile.addEventListener("change", function(){
    const file = customfile.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(){
            const result = reader.result;
            img.src = result;
        }
        reader.readAsDataURL(file);
    }
});

        function chooseYes() {
            document.getElementById("SCAST").hidden = false;
        }

        function chooseNo() {
            document.getElementById("SCAST").hidden = true;
        }

        function chooseFTS() {
            document.getElementById("workingStud").hidden = true;
        }

        function chooseWS() {
            document.getElementById("workingStud").hidden = false;
        }

        function faemp(id){
            var ofw = document.getElementById("faofw");
            var faother = document.getElementById("faother");
            if(id == 1){
                ofw.disabled = false;
                faother.disabled = true;
                ofw.focus();
            }else if(id == 2){
                ofw.disabled = true;
                faother.disabled = false;
                faother.focus();
            }else{
                ofw.disabled = true;
                faother.disabled = true;
            }
        }
        
        function moemp(id){
            var ofw = document.getElementById("moofw");
            var faother = document.getElementById("moother");
            if(id == 1){
                ofw.disabled = false;
                faother.disabled = true;
                ofw.focus();
            }else if(id == 2){
                ofw.disabled = true;
                faother.disabled = false;
                faother.focus();
            }else{
                ofw.disabled = true;
                faother.disabled = true;
            }
        }
        
        function Scholar() {
            var yes = document.getElementById("yes-scholar");
            var inp = document.getElementById("scholar-text");

            inp.disabled = yes.checked ? false : true;
            inp.value = "";
            if (!inp.disabled) {
                inp.focus();
            }
            
        }
        
        function decideNo() {
            var noDecide = document.getElementById("no-decide");
            var text = document.getElementById("influenced");

            text.disabled = noDecide.checked ? false : true;
            text.value = "";
            if (!text.disabled) {
                text.focus();
            }
        }

        function disability(id){
            var text = document.getElementById("pwd-text");
            if(id == 1) {text.disabled = false; text.focus()}
            else text.disabled = true;
        }
        function parent(id){
            var text = document.getElementById("parent-text");
            if(id == 1) {text.disabled = false; text.focus()}
            else text.disabled = true;
        }
        function employee(id){
            var text = document.getElementById("emp-text");
            if(id == 1) {text.disabled = false; text.focus()}
            else text.disabled = true;
        }
        
        function OthersPossesed() {
            var op = document.getElementById("otherpossesed");
            var opt = document.getElementById("otherposstext");

            opt.disabled = op.checked ? false : true;
            opt.value = "";
            if (!opt.disabled) {
                opt.focus();
            }
        }

        function SpecifyOther() {
            var spec = document.getElementById("otherspecify");
            var spectxt = document.getElementById("specify-text");

            spectxt.disabled = spec.checked ? false : true;
            spectxt.value = "";
            if (!spectxt.disabled) {
                spectxt.focus();
            }
        }

        function NumbersOnly(input) {
            var regex = /[^0-9'"]/g;
            input.value = input.value.replace(regex, "");
        }
        
        function HealthOther() {
            var heal = document.getElementById("healthprob");
            var txt = document.getElementById("health-text");

            txt.disabled = heal.checked ? false : true;
            txt.value = "";
            if (!txt.disabled) {
                txt.focus();
            }
        }
