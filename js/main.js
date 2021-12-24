function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("id").value = "";
    document.getElementById("mus_adi").value = "";
    document.getElementById("mus_soyadi").value = "";
    document.getElementById("mus_mail").value = "";
    document.getElementById("mus_tc").value = "";
    document.getElementById("mus_adres").value = "";
    document.getElementById("mus_tel").value = "";
}

function doldur(index) {
    var id = document.getElementById(index + "1").innerText;
    var adi = document.getElementById(index + "2").innerText;
    var soyadi = document.getElementById(index + "3").innerText;
    var mail = document.getElementById(index + "4").innerText;
    var tc = document.getElementById(index + "5").innerText;
    var adres = document.getElementById(index + "6").innerText;
    var telefon = document.getElementById(index + "7").innerText;

    document.getElementById("id").value = id;
    document.getElementById("mus_adi").value = adi;
    document.getElementById("mus_soyadi").value = soyadi;
    document.getElementById("mus_mail").value = mail;
    document.getElementById("mus_tc").value = tc;
    document.getElementById("mus_adres").value = adres;
    document.getElementById("mus_tel").value = telefon;


}