document.addEventListener("DOMContentLoaded", (event) => {
    const drawerButton = document.querySelector("#drawerButton");
    const navigation = document.querySelector(".mobile-nav");
    const sidebar = document.querySelector(".sidebar");
    const showUserToggle = document.querySelector("#showUser");
    const overlay = document.querySelector("#overlay");

    function drawer(event) {
        if (navigation) {
            navigation.classList.toggle("open");
            event.stopPropagation();
        }
    }

    function toggleSidebar(event) {
        if (sidebar && overlay) {
            sidebar.classList.toggle("open");
            overlay.classList.toggle("visible");
            event.stopPropagation();
        }
    }

    function hideSidebar() {
        if (sidebar && overlay) {
            sidebar.classList.remove("open");
            overlay.classList.remove("visible");
        }
    }

    if (drawerButton) {
        drawerButton.addEventListener("click", drawer);
    }

    if (showUserToggle) {
        showUserToggle.addEventListener("click", toggleSidebar);
    }

    if (overlay) {
        overlay.addEventListener("click", hideSidebar);
    }

    // Modal
    const openModalBtn = document.getElementById("openModalBtn");
    const modal = document.getElementById("modal");
    const closeModalBtn = document.getElementById("closeModalBtn");

    if (openModalBtn) {
        openModalBtn.addEventListener("click", () => {
            modal.style.display = "block";
        });
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });
    }

    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    const dropdownMenu = document.querySelector(".dropdown");
    const dropdown = document.querySelector(".app-bar__user-icon");

    if (dropdown) {
        dropdown.addEventListener("click", (event) => {
            event.stopPropagation(); // Menghentikan event klik dari merambat ke atas
            toggleDropdown();
        });
    }

    document.addEventListener("click", (event) => {
        const isClickedInsideDropdown = dropdownMenu.contains(event.target); // Memeriksa apakah target klik berada di dalam dropdown

        if (!isClickedInsideDropdown) {
            dropdownMenu.style.visibility = "hidden"; // Menyembunyikan dropdown jika klik dilakukan di luar dropdown
        }
    });

    function toggleDropdown() {
        if (dropdownMenu.style.visibility === "visible") {
            dropdownMenu.style.visibility = "hidden";
        } else {
            dropdownMenu.style.visibility = "visible";
        }
    }
});

// JS untuk upload file
// document.addEventListener("DOMContentLoaded", function () {
//     const input = document.getElementById("uploadInput");
//     const form = document.getElementById("editFotoProfileForm");
//     const img = document.querySelector(".edit-profile__picture img");

//     input.addEventListener("change", function () {
//         const file = this.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 img.src = e.target.result;
//             };
//             reader.readAsDataURL(file);

//             // Submit form secara otomatis setelah memilih gambar
//             form.submit();
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq__item");
    console.log(faqItems);

    faqItems.forEach((item) => {
        const question = item.querySelector(".faq__body-question");
        question.addEventListener("click", () => {
            item.classList.toggle("active");
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.querySelector(".edit-icon");
    const uploadButton = document.querySelector(".upload-edit");

    if (editButton) {
        editButton.addEventListener("click", () => {
            uploadButton.style.display = "block";
        });
    }

    // Menangani perubahan pada input file
    const uploadInput = document.getElementById("uploadInput");

    if (uploadInput) {
        uploadInput.addEventListener("change", () => {
            if (uploadInput.files.length > 0) {
                uploadButton.style.display = "block";
            } else {
                uploadButton.style.display = "none";
            }
        });

        uploadInput.addEventListener("click", () => {
            uploadInput.value = null;
            uploadButton.style.display = "none";
        });
    }
});
