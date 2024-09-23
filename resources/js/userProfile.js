//More Deskripsi
function toggleTextDesc(element) {
    console.log('Button clicked');
    // Mengakses elemen induk dari tombol yang diklik
    var parent = element.parentElement;

    // Mengambil elemen short-desc dan more-desc dari parent
    var shortDesc = parent.querySelector('.short-desc');
    var moreDesc = parent.querySelector('.more-desc');
    
    // Mengecek apakah moreDesc sedang disembunyikan
    if (moreDesc.style.display === "none" || moreDesc.style.display === "") {
        shortDesc.style.display = "none";
        moreDesc.style.display = "inline";
        element.textContent = "Less";
    } else {
        shortDesc.style.display = "inline";
        moreDesc.style.display = "none";
        element.textContent = "More";
    }
}