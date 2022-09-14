<<<<<<< HEAD
$(function(){

=======

$(function(){
    
    
    // var sttype = 102, stgctc = 47,
    // fname = "",
    // birth = formatDate($("#bd").val()),
    // sex = 502,
    // gctcsex = 75,
    // cstatus = 145,
    // pwd = 293,
    // siparent = 293,
    // wstudent = 293,
    // pob = $("#place-add").val(),
    // img = document.getElementById("pro-image"),
    // faname = "",
    // moname = "",
    // raddress = $("#res-state").val().toUpperCase()+", "+$("#res-city").val().toUpperCase()+", "+$("#res-add").val().toUpperCase(),
    // caddress = $("#cur-state").val().toUpperCase()+", "+$("#cur-city").val().toUpperCase()+", "+$("#cur-add").val().toUpperCase(),
    // fawork = $("input[name='fa-work']:checked").val(),
    // mowork = $("input[name='mo-work']:checked").val(),
    // pwdtext = $("#pwd-text").val(),
    // parenttext = $("#parent-text").val(),
    // emptext = $("#emp-text").val(),
    // wstudent = 97;
    
    // function load(){
    //     var canvas = document.getElementById("pdf_renderer"),
    //     ctx = canvas.getContext("2d");
    //     birth = formatDate($("#bd").val());
    //     pob = $("#place-add").val();
    //     img = document.getElementById("pro-image");
    //     raddress = $("#res-state").val().toUpperCase()+", "+$("#res-city").val().toUpperCase()+", "+$("#res-add").val().toUpperCase();
    //     caddress = $("#cur-state").val().toUpperCase()+", "+$("#cur-city").val().toUpperCase()+", "+$("#cur-add").val().toUpperCase();
    //     fawork = $("input[name='fa-work']:checked").val();
    //     mowork = $("input[name='mo-work']:checked").val();
    //     pwdtext = $("#pwd-text").val();
    //     parenttext = $("#parent-text").val();
    //     emptext = $("#emp-text").val();
    //     wstudent = 97;
    //     if($('input[name="selfassesment"]:checked').val() == 'No') wstudent = 220;
    //     if($("#mosuffix").val() == '') moname = $("#molname").val().toUpperCase()+", "+$("#mofname").val().toUpperCase()+" "+$("#momname").val().toUpperCase();
    //     else moname = $("#molname").val().toUpperCase()+", "+$("#mofname").val().toUpperCase()+" "+$("#mosuffix").val().toUpperCase()+" "+$("#momname").val().toUpperCase();
    //     if($("#fasuffix").val() == '') faname = $("#falname").val().toUpperCase()+", "+$("#fafname").val().toUpperCase()+" "+$("#famname").val().toUpperCase();
    //     else faname = $("#falname").val().toUpperCase()+", "+$("#fafname").val().toUpperCase()+" "+$("#fasuffix").val().toUpperCase()+" "+$("#famname").val().toUpperCase();
    //     if(fawork == 'ofw') fawork = $("#faofw").val();
    //     else if(fawork == 'other') fawork =$("#faother").val();
    //     if(mowork == 'ofw') mowork = $("#moofw").val();
    //     else if(mowork == 'other') mowork =$("#moother").val();
    //     if($("#suffix").val() != '') 
    //     fname = $("#lname").val().toUpperCase()+", "+$("#fname").val().toUpperCase()+" "+$("#suffix").val().toUpperCase()+" "+$("#mname").val().toUpperCase();
    //     else 
    //     fname = $("#lname").val().toUpperCase()+", "+$("#fname").val().toUpperCase()+" "+$("#mname").val().toUpperCase();
        
    //     ctx.drawImage(img, 448, 140, 107, 124);
    //     firstctx.drawImage(img, 412, 176, 142, 142);
    //     if($("#gender").val() == 'Female'){sex = 559; gctcsex = 183;}
    //     if($("#status").val() == 'Married'){cstatus = 221;}
    //     else if($("#status").val() == 'Widowed'){cstatus = 297;}
    //     else if($("#status").val() == 'Separated'){cstatus = 411;}
    //     if($("input[name='pwd']:checked").val() == 'yes') pwd = 257;
    //     if($("input[name='sparent']:checked").val() == 'yes') siparent = 257;
    //     if($("input[name='wstudent']:checked").val() == 'yes') wstudent = 257;
    //     ctx.fillStyle = "#000";
    //     ctx.font = "11px Arial";
    //     ctx.fillText("✔",sttype, 245);
    //     ctx.fillText($("#campus").val(),95,258);
    //     ctx.fillText($("#firstcourse").val().toUpperCase(),93, 284);
    //     ctx.fillText($("#secondcourse").val().toUpperCase(),93, 298);
    //     ctx.fillText($("#thirdcourse").val().toUpperCase(),93, 311);
    //     ctx.fillText(fname, 55, 353);
    //     ctx.fillText(birth,181, 370);
    //     ctx.fillText("✔",sex, 372);
    //     ctx.fillText(pob.toUpperCase(),117, 383);
    //     ctx.fillText("✔",cstatus, 418);
    //     ctx.fillText($("#citizenship").val().toUpperCase(),523, 418);
    //     ctx.fillText($("#height").val(),110, 431);
    //     ctx.fillText($("#width").val(),223, 431);
    //     ctx.fillText($("#religion").val().toUpperCase(),311, 431);
    //     ctx.fillText($("#ethnic").val().toUpperCase(),518, 431);
    //     ctx.fillText($("#email").val(),127, 444);
    //     ctx.fillText($("#phone").val(),433, 444);
    //     ctx.fillText(raddress,143, 457);
    //     ctx.fillText($("#res-zip").val(),517, 457);
    //     ctx.fillText($("#spouse").val().toUpperCase(),181, 484);
    //     ctx.fillText($("#occupation").val().toUpperCase(),404, 484);
    //     ctx.fillText($("#children").val(),557, 484);
    //     ctx.fillText(faname,125, 497);
    //     ctx.fillText(fawork.toUpperCase(),364, 497);
    //     ctx.fillText($("#facontact").val(),505, 497);
    //     ctx.fillText(moname,129, 510);
    //     ctx.fillText(mowork.toUpperCase(),353, 510);
    //     ctx.fillText($("#mocontact").val(),497, 510);
    //     ctx.fillText($("#guardian").val().toUpperCase(),228, 524);
    //     ctx.fillText($("#gcontact").val(),492, 524);
    //     ctx.fillText($("#gaddress").val().toUpperCase(),101, 537);
    //     ctx.fillText($("#elemschool").val().toUpperCase(),109, 563);
    //     ctx.fillText($("#elemyear").val(),527, 563);
    //     ctx.fillText($("#secschool").val().toUpperCase(),142, 576);
    //     ctx.fillText($("#strand").val().toUpperCase(),371, 576);
    //     ctx.fillText($("#secyear").val(),523, 576);
    //     ctx.fillText($("#vocschool").val().toUpperCase(),107, 590);
    //     ctx.fillText($("#voccourse").val().toUpperCase(),371, 590);
    //     ctx.fillText($("#vocyear").val(),523, 590);
    //     ctx.fillText("N/A",94, 603);
    //     ctx.fillText("None",310, 603);
    //     ctx.fillText("none",460, 603);
    //     ctx.fillText("returning",167, 630);
    //     ctx.fillText("yearreturn",361, 630);
    //     ctx.fillText("2010",543, 630);
    //     ctx.fillText("✔",pwd, 655);
    //     ctx.fillText(pwdtext,483, 656);
    //     ctx.fillText("✔",siparent, 670);
    //     ctx.fillText(parenttext,491, 669);
    //     ctx.fillText("✔",wstudent, 684);
    //     ctx.fillText(emptext,453, 682);
    // }    

    // function loadgctc(){
    //     var first = document.getElementById("first_page"),
    //     firstctx = first.getContext('2d'),
    //     second = document.getElementById("second_page"),
    //     secondctx = second.getContext('2d');
    //     firstctx.fillStyle = "#000";
    //     firstctx.font = "11px Arial";
    //     secondctx.fillStyle = "#000";
    //     secondctx.font = "11px Arial";
    //     firstctx.fillText("✔",stgctc, 207);
    //     firstctx.fillText(fname,70, 255);
    //     firstctx.fillText($("#gctc-course").val()+" "+$("#gctc-year").val(),114, 271);
    //     //firstctx.fillText("✔",112, 287);
    //     //firstctx.fillText("✔",256, 287);
    //     firstctx.fillText(birth,105, 302);
    //     firstctx.fillText($("#age").val(),63, 318);
    //     firstctx.fillText("✔",gctcsex, 335);
    //     firstctx.fillText($("#status").val().toUpperCase(),101, 350);
    //     firstctx.fillText($("#spouse").val().toUpperCase(),180, 382);
    //     firstctx.fillText($("#occupation").val().toUpperCase(),415, 382);
    //     firstctx.fillText($("#children").val(),557, 382);
    //     firstctx.fillText(raddress,139, 398);
    //     firstctx.fillText(caddress,259, 414);
    //     firstctx.fillText($("#email").val(),117, 430);
    //     firstctx.fillText($("#fbacc").val(),307, 430);
    //     firstctx.fillText($("#phone").val(),498, 430);
    //     firstctx.fillText($("#ethnic").val().toUpperCase(),136, 445);
    //     firstctx.fillText($("#religion").val().toUpperCase(),259, 445);
    //     firstctx.fillText($("#language").val().toUpperCase(),464, 445);
    //     firstctx.fillText("✔",wstudent, 462);
    //     firstctx.fillText($("#whomwork").val().toUpperCase(),297, 477);
    //     firstctx.fillText(faname,113, 525);
    //     alert($("#mocontact").val().toUpperCase());
    //     firstctx.fillText($("#facontact").val(),122, 541);
    //     firstctx.fillText(("#faaddress").val().toUpperCase(),334, 541);
    //     firstctx.fillText(moname,118, 556);
    //     firstctx.fillText($("#mocontact").val(),122, 572);
    //     firstctx.fillText($("#moaddress").val().toUpperCase(),334, 572);
    //     firstctx.fillText("✔",103, 589);
    //     firstctx.fillText("✔",220, 589);
    //     firstctx.fillText("✔",364, 589);
    //     firstctx.fillText("✔",101, 605);
    //     firstctx.fillText("✔",257, 605);
    //     firstctx.fillText("✔",401, 605);
    //     firstctx.fillText("income",217, 620);
    //     firstctx.fillText("1",150, 636);
    //     firstctx.fillText("3",277, 636);
    //     firstctx.fillText("5",411, 636);
    //     firstctx.fillText("7",563, 636);
    //     firstctx.fillText("guardian",204, 652);
    //     firstctx.fillText("Contact no.",461, 652);
    //     firstctx.fillText("General ability",129, 699);
    //     firstctx.fillText("verbal ability",311, 699);
    //     firstctx.fillText("numerical ability",511, 699);
    //     firstctx.fillText("spatial ability",134, 715);
    //     firstctx.fillText("perceptual ability",327, 715);
    //     firstctx.fillText("manual ability",500, 715);
    //     firstctx.fillText("hobbies",197, 763);
    //     firstctx.fillText("motto",397, 763);
    //     firstctx.fillText("special skiils",148, 779);
    //     firstctx.fillText("special interest",445, 779);
    //     firstctx.fillText("elementary school",135, 826);
    //     firstctx.fillText("elementary year graduate",453, 826);
    //     firstctx.fillText("secondary school",130, 842);
    //     firstctx.fillText("secondary year graduate",453, 842);
    //     firstctx.fillText("vocational course",132, 858);
    //     firstctx.fillText("course",327, 858);
    //     firstctx.fillText("vocational year graduate",490, 858);
    //     firstctx.fillText("last school attend",220, 874);
    //     firstctx.fillText("course taken",415, 874);
    //     firstctx.fillText("2010",557, 874);
    //     secondctx.fillText("Honors/Awards",164,74);
    //     secondctx.fillText("✔",193,88);
    //     secondctx.fillText("✔",244,88);
    //     secondctx.fillText("scholarship",457,88);
    //     secondctx.fillText("BSIT",317,103);
    //     secondctx.fillText("✔", 255, 120);
    //     secondctx.fillText("✔", 306, 120);
    //     secondctx.fillText("Argie Ragas", 490, 120);
    //     secondctx.fillText("Argie Ragas", 255, 136);
    //     secondctx.fillText("Argie Ragas", 230, 152);
    //     secondctx.fillText("Argie Ragas", 100, 184);
    //     secondctx.fillText("Argie Ragas", 360, 184);
    //     secondctx.fillText("Argie Ragas", 120, 199);
    //     secondctx.fillText("Argie Ragas", 365, 199);
    //     secondctx.fillText("Argie Ragas", 170, 215);
    //     secondctx.fillText("Argie Ragas", 430, 215);
    //     secondctx.fillText("✔", 81, 260);
    //     secondctx.fillText("✔", 194, 260);
    //     secondctx.fillText("✔", 311, 260);
    //     secondctx.fillText("✔", 437, 260);
    //     secondctx.fillText("✔", 81, 274);
    //     secondctx.fillText("✔", 194, 274);
    //     secondctx.fillText("✔", 311, 274);
    //     secondctx.fillText("✔", 437, 274);
    //     secondctx.fillText("✔", 81, 287);
    //     secondctx.fillText("✔", 194, 287);
    //     secondctx.fillText("✔", 311, 287);
    //     secondctx.fillText("✔", 437, 287);
    //     secondctx.fillText("✔", 81, 301);
    //     secondctx.fillText("✔", 194, 301);
    //     secondctx.fillText("✔", 311, 301);
    //     secondctx.fillText("✔", 437, 301);
    //     secondctx.fillText("✔", 81, 315);
    //     secondctx.fillText("✔", 194, 315);
    //     secondctx.fillText("✔", 311, 315);
    //     secondctx.fillText("✔", 437, 315);
    //     secondctx.fillText("✔", 81, 329);
    //     secondctx.fillText("✔", 194, 329);
    //     secondctx.fillText("✔", 311, 329);
    //     secondctx.fillText("✔", 437, 329);
    //     secondctx.fillText("Argie Ragas", 495, 328);
    //     secondctx.fillText("✔", 81, 356);
    //     secondctx.fillText("✔", 293, 356);
    //     secondctx.fillText("Argie Ragas", 470, 355);
    //     secondctx.fillText("✔", 81, 370);
    //     secondctx.fillText("✔", 293, 370);
    //     secondctx.fillText("✔", 81, 384);
    //     secondctx.fillText("✔", 293, 384);
    //     secondctx.fillText("✔", 81, 398);
    //     secondctx.fillText("✔", 293, 398);
    //     secondctx.fillText("Argie Ragas", 440, 397);
    //     secondctx.fillText("Argie Ragas", 81, 425);
    //     secondctx.fillText("Argie Ragas", 370, 452);
    //     secondctx.fillText("Argie Ragas", 90, 452);
    //     secondctx.fillText("Argie Ragas", 98, 466);
    //     secondctx.fillText("Argie Ragas", 380, 466);
    //     secondctx.fillText("Argie Ragas", 495, 830);
    //     secondctx.fillText("Sir Argie Gwapo", 81, 830);
    // }
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
    
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
<<<<<<< HEAD
=======


>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
