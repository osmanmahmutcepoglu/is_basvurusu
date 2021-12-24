


<button class="open-button" onclick="openForm()">Müşteri Ekle/Güncelle</button>

<div class="form-popup" id="myForm">
    <form action="kayitisle-guncelle.php" class="form-container" method="post">
        <h2>Müşteri Ekle/Güncelle</h2>

        <input type="hidden" name="id" id="id">


        <label for="ad"><b>Ad</b></label>
        <input type="text" placeholder="Müşteri Adını Giriniz" name="mus_adi" id="mus_adi" required>

        <label for="soyad"><b>Soyad</b></label>
        <input type="text" placeholder="Müşteri Soyadını Giriniz"  name="mus_soyadi" id="mus_soyadi" required>

        <label for="ad"><b>Müşteri TC No</b></label>
        <input type="text" placeholder="Müşteri TC No Giriniz"  name="mus_tc" id="mus_tc" required>

        <label for="ad"><b>Müşteri Telefon</b></label>
        <input type="text" placeholder="Müşteri Telefon Giriniz"  name="mus_tel" id="mus_tel" required>

        <label for="email"><b>E-mail</b></label>
        <input type="text" placeholder="Müşteri Mail Adresi Giriniz"  name="mus_mail" id="mus_mail" required>

        <label for="ad"><b>Müşteri Adres</b></label>
        <textarea type="text" placeholder="Müşteri Adresini Giriniz" name="mus_adres" id="mus_adres" required></textarea>


        <button type="submit" class="btn">Ekle / Güncelle</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Kapat</button>
    </form>
</div>