/* 
  === Javascript For User Page ===
*/

/* Home Page */
// Handle Mobile Menu Toggle
document.addEventListener("DOMContentLoaded", () => {
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const burgerIcon = document.getElementById("burgerIcon");
    const closeIcon = document.getElementById("closeIcon");

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener("click", () => {
            const isHidden = mobileMenu.classList.contains(
                "-translate-y-[calc(100%+5rem)]"
            );

            // Toggle visibility
            if (isHidden) {
                mobileMenu.classList.remove(
                    "-translate-y-[calc(100%+5rem)]",
                    "opacity-0"
                );
                mobileMenu.classList.add("translate-y-0", "opacity-100");

                // Update icons
                burgerIcon.classList.add("scale-0");
                burgerIcon.classList.remove("scale-100");
                closeIcon.classList.add("scale-100");
                closeIcon.classList.remove("scale-0");
            } else {
                mobileMenu.classList.add(
                    "-translate-y-[calc(100%+5rem)]",
                    "opacity-0"
                );
                mobileMenu.classList.remove("translate-y-0", "opacity-100");

                // Update icons
                closeIcon.classList.add("scale-0");
                closeIcon.classList.remove("scale-100");
                burgerIcon.classList.add("scale-100");
                burgerIcon.classList.remove("scale-0");
            }
        });
    }
});

// Handle Profile Dropdown
document.addEventListener("DOMContentLoaded", () => {
    const profileMenuButton = document.getElementById("profile-menu-button");
    const profileDropdown = document.getElementById("profile-dropdown");

    if (profileMenuButton && profileDropdown) {
        profileMenuButton.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent immediate closing
            profileDropdown.classList.toggle("hidden");

            // Close dropdown when clicking outside
            const handleOutsideClick = (e) => {
                if (
                    !profileDropdown.contains(e.target) &&
                    !profileMenuButton.contains(e.target)
                ) {
                    profileDropdown.classList.add("hidden");
                    document.removeEventListener("click", handleOutsideClick);
                }
            };

            // Add event listener only if dropdown is visible
            if (!profileDropdown.classList.contains("hidden")) {
                document.addEventListener("click", handleOutsideClick);
            }
        });
    }
});

/* Volunteer Page */
// Dropdown Categories
document.addEventListener("DOMContentLoaded", () => {
    const dropdownButton = document.getElementById("dropdownCategoriesButton");
    const dropdownCategories = document.getElementById("dropdownCategories");
    const arrowDown = document.getElementById("arrowDown");
    const arrowUp = document.getElementById("arrowUp");

    dropdownButton.addEventListener("click", () => {
        dropdownCategories.classList.toggle("hidden");

        // arrows icons animation
        if (dropdownCategories.classList.contains("hidden")) {
            arrowDown.classList.remove("scale-0");
            arrowUp.classList.add("scale-0");
        } else {
            arrowDown.classList.add("scale-0");
            arrowUp.classList.remove("scale-0");
        }
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", (event) => {
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownCategories.contains(event.target)
        ) {
            dropdownCategories.classList.add("hidden");
            arrowDown.classList.remove("scale-0");
            arrowUp.classList.add("scale-0");
        }
    });
});

//(LOGIN) JAVASCRIPT LIST DAN DETAIL KEGIATAN
document.addEventListener('DOMContentLoaded', () => {
    const detailContainer = document.getElementById('detailVolunteer');
    const defaultMessage = detailContainer.querySelector('.default-message');
    const detailContent = detailContainer.querySelector('.detail-content');

    const applyButton = document.getElementById("applyBtn");
    const applyModal = document.getElementById("applyMdl");
    const submitButton = document.getElementById("submitBtn");
    const closeModal = document.getElementById("closeApplyMdl");
    const notification = document.getElementById("notification");
    const registrationForm = document.getElementById('registrationForm');
    const motivationTextarea = document.getElementById('motivation');

    const backButton = document.getElementById("backBtn");

    // Tampilkan pesan default saat halaman dimuat
    defaultMessage.classList.remove('hidden');
    detailContent.classList.add('hidden');

    document.querySelectorAll('.volunteerCard').forEach(card => {
        card.addEventListener('click', () => {

            detailContainer.classList.remove("translate-y-full");

            defaultMessage.classList.add('hidden');
            detailContent.classList.remove('hidden');

            // Ambil data dari atribut data-*
            const idKegiatan = card.dataset.idKegiatan;
            const namaKegiatan = card.dataset.namaKegiatan;
            const namaMitra = card.dataset.namaMitra;
            const lokasiKegiatan = card.dataset.lokasiKegiatan;
            const logo = card.dataset.logo;
            const sistemKegiatan = card.dataset.sistemKegiatan;
            const sisaHari = parseInt(card.dataset.sisaHari, 10);
            const pendaftarCount  = card.dataset.pendaftarCount;
            const deskripsi = card.dataset.deskripsi;
            const namaKriteria = card.dataset.namaKriteria;
            const namaBenefit = card.dataset.namaBenefit;
            const button = card.dataset.button;

            // Tampilkan data di bagian detail
            detailContainer.querySelector('.namaKegiatan').textContent = namaKegiatan;
            detailContainer.querySelector('.namaMitra').textContent = namaMitra;
            detailContainer.querySelector('.lokasiKegiatan').textContent = lokasiKegiatan;
            detailContainer.querySelector('img').src = logo;
            detailContainer.querySelector('.sistemKegiatan').textContent = sistemKegiatan;
            detailContainer.querySelector('.sisaHari').textContent = sisaHari;
            detailContainer.querySelector('.pendaftarCount').textContent = pendaftarCount;
            detailContainer.querySelector('.deskripsi').textContent = deskripsi;
            detailContainer.querySelector('.button').textContent = button;

            if (button === 'Apply') {
                applyButton.classList.remove('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
                applyButton.classList.add('bg-cyan-500', 'hover:bg-button_hover', 'cursor-pointer');
                applyButton.disabled = false; // Aktifkan tombol
            } else if (button === 'Closed') {
                applyButton.classList.remove('bg-cyan-500', 'hover:bg-button_hover', 'cursor-pointer');
                applyButton.classList.add('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
                applyButton.disabled = true; // Nonaktifkan tombol
            }
            
            const kriteriaContainer = detailContainer.querySelector('.kriteriaContainer'); // Ambil container kriteria
            kriteriaContainer.innerHTML = ''; // Kosongkan container sebelum menambah elemen baru
            
            if (namaKriteria && namaKriteria.trim() !== '') {
                // Jika data kriteria ada
                const kriteriaArray = namaKriteria.split(','); // Pisahkan berdasarkan koma
                kriteriaArray.forEach(kriteria => {
                    const kriteriaSpan = document.createElement('span');
                    kriteriaSpan.classList.add('namaKriteria', 'px-4', 'py-1', 'bg-sky-200', 'text-sm', 'rounded-lg');
                    kriteriaSpan.textContent = kriteria.trim(); // Hapus spasi berlebih
                    kriteriaContainer.appendChild(kriteriaSpan);
                });
            } else {
                // Jika data kriteria kosong, tampilkan pesan
                const emptyMessage = document.createElement('span');
                emptyMessage.classList.add('namaKriteria', 'px-4', 'py-1', 'bg-red-200', 'text-sm', 'rounded-lg');
                emptyMessage.textContent = 'Mitra belum mengisikan data';
                kriteriaContainer.appendChild(emptyMessage);
            }
            
            const benefitContainer = detailContainer.querySelector('.benefitContainer'); // Ambil container kriteria
            benefitContainer.innerHTML = ''; // Kosongkan container sebelum menambah elemen baru
            
            if (namaBenefit && namaBenefit.trim() !== '') {
                // Jika data kriteria ada
                const benefitArray = namaBenefit.split(','); // Pisahkan berdasarkan koma
                benefitArray.forEach(benefit => {
                    const benefitSpan = document.createElement('span');
                    benefitSpan.classList.add('namaBenefit', 'px-4', 'py-1', 'bg-sky-200', 'text-sm', 'rounded-lg');
                    benefitSpan.textContent = benefit.trim(); // Hapus spasi berlebih
                    benefitContainer.appendChild(benefitSpan);
                });
            } else {
                // Jika data kriteria kosong, tampilkan pesan
                const emptyMessage = document.createElement('span');
                emptyMessage.classList.add('namaBenefit', 'px-4', 'py-1', 'bg-red-200', 'text-sm', 'rounded-lg');
                emptyMessage.textContent = 'Mitra belum mengisikan data';
                benefitContainer.appendChild(emptyMessage);
            }

            const id = document.getElementById('applyMdl').dataset.idUser;
            /// Isi form dengan ID kegiatan
            const hiddenKegiatanInput = document.createElement('input');
            hiddenKegiatanInput.type = 'hidden';
            hiddenKegiatanInput.name = 'id_kegiatan';
            hiddenKegiatanInput.value = idKegiatan;

            // Hapus input hidden sebelumnya (jika ada) agar tidak duplikasi
            const existingInput = registrationForm.querySelector('input[name="id_kegiatan"]');
            if (existingInput) existingInput.remove();

            // Tambahkan input hidden ke form
            registrationForm.appendChild(hiddenKegiatanInput);

            // Update placeholder pada motivation
            motivationTextarea.placeholder = `Write your motivation for joining "${namaKegiatan}" from "${namaMitra}"...`;
            
            applyButton.addEventListener("click", () => {
                // Perbarui action form pendaftaran
                const form = document.querySelector('#registrationForm');
                form.action = `${id}/add-pendaftaran/${idKegiatan}`;

                applyModal.classList.remove("opacity-0", "pointer-events-none");
                applyModal.querySelector(".transform").classList.remove("scale-95");

            });
        });
    });
    backButton.addEventListener("click", () => {
        detailContainer.classList.add("translate-y-full");
    });

    submitButton.addEventListener("click", () => {
        applyModal.classList.add("opacity-0", "pointer-events-none");
        applyModal.querySelector(".transform").classList.add("scale-95");
        notification.classList.remove("opacity-0", "pointer-events-none");
        
        // Menghilangkan notifikasi setelah 3 detik
        setTimeout(() => {
            notification.classList.add("opacity-0", "pointer-events-none");
        }, 3000);
    });

    // Event untuk menutup modal
    closeModal.addEventListener('click', () => {
        applyModal.classList.add('opacity-0', 'pointer-events-none');
        applyModal.classList.remove('opacity-100');
    });

    // Event untuk menutup modal ketika klik di luar modal
    applyModal.addEventListener('click', (e) => {
        if (e.target === applyModal) {
        applyModal.classList.add('opacity-0', 'pointer-events-none');
        applyModal.classList.remove('opacity-100');
        }
    });
});

//(NOT LOGIN YET) JAVASCRIPT LIST DAN DETAIL KEGIATAN
document.addEventListener('DOMContentLoaded', () => {
    const detailContainer = document.getElementById('detailVolunteer');
    const defaultMessage = detailContainer.querySelector('.default-message');
    const detailContent = detailContainer.querySelector('.detail-content');

    const applyButton = document.getElementById("applyBtn");
    const applyModal = document.getElementById("applyMdl");
    const closeModal = document.getElementById("closeApplyMdl");
    const registrationForm = document.getElementById('registrationForm');

    const backButton = document.getElementById("backBtn");

    // Tampilkan pesan default saat halaman dimuat
    defaultMessage.classList.remove('hidden');
    detailContent.classList.add('hidden');

    document.querySelectorAll('.volunteerCard').forEach(card => {
        card.addEventListener('click', () => {

            detailContainer.classList.remove("translate-y-full");

            defaultMessage.classList.add('hidden');
            detailContent.classList.remove('hidden');

            // Ambil data dari atribut data-*
            const idKegiatan = card.dataset.idKegiatan;
            const namaKegiatan = card.dataset.namaKegiatan;
            const namaMitra = card.dataset.namaMitra;
            const lokasiKegiatan = card.dataset.lokasiKegiatan;
            const logo = card.dataset.logo;
            const sistemKegiatan = card.dataset.sistemKegiatan;
            const sisaHari = card.dataset.sisaHari;
            const pendaftarCount  = card.dataset.pendaftarCount;
            const deskripsi = card.dataset.deskripsi;
            const namaKriteria = card.dataset.namaKriteria;
            const namaBenefit = card.dataset.namaBenefit;

            // Tampilkan data di bagian detail
            detailContainer.querySelector('.namaKegiatan').textContent = namaKegiatan;
            detailContainer.querySelector('.namaMitra').textContent = namaMitra;
            detailContainer.querySelector('.lokasiKegiatan').textContent = lokasiKegiatan;
            detailContainer.querySelector('img').src = logo;
            detailContainer.querySelector('.sistemKegiatan').textContent = sistemKegiatan;
            detailContainer.querySelector('.sisaHari').textContent = sisaHari;
            detailContainer.querySelector('.pendaftarCount').textContent = pendaftarCount;
            detailContainer.querySelector('.deskripsi').textContent = deskripsi;
            
            const kriteriaContainer = detailContainer.querySelector('.kriteriaContainer'); // Ambil container kriteria
            kriteriaContainer.innerHTML = ''; // Kosongkan container sebelum menambah elemen baru
            
            if (namaKriteria && namaKriteria.trim() !== '') {
                // Jika data kriteria ada
                const kriteriaArray = namaKriteria.split(','); // Pisahkan berdasarkan koma
                kriteriaArray.forEach(kriteria => {
                    const kriteriaSpan = document.createElement('span');
                    kriteriaSpan.classList.add('namaKriteria', 'px-4', 'py-1', 'bg-sky-200', 'text-sm', 'rounded-lg');
                    kriteriaSpan.textContent = kriteria.trim(); // Hapus spasi berlebih
                    kriteriaContainer.appendChild(kriteriaSpan);
                });
            } else {
                // Jika data kriteria kosong, tampilkan pesan
                const emptyMessage = document.createElement('span');
                emptyMessage.classList.add('namaKriteria', 'px-4', 'py-1', 'bg-red-200', 'text-sm', 'rounded-lg');
                emptyMessage.textContent = 'Mitra belum mengisikan data';
                kriteriaContainer.appendChild(emptyMessage);
            }
            
            const benefitContainer = detailContainer.querySelector('.benefitContainer'); // Ambil container kriteria
            benefitContainer.innerHTML = ''; // Kosongkan container sebelum menambah elemen baru
            
            if (namaBenefit && namaBenefit.trim() !== '') {
                // Jika data kriteria ada
                const benefitArray = namaBenefit.split(','); // Pisahkan berdasarkan koma
                benefitArray.forEach(benefit => {
                    const benefitSpan = document.createElement('span');
                    benefitSpan.classList.add('namaBenefit', 'px-4', 'py-1', 'bg-sky-200', 'text-sm', 'rounded-lg');
                    benefitSpan.textContent = benefit.trim(); // Hapus spasi berlebih
                    benefitContainer.appendChild(benefitSpan);
                });
            } else {
                // Jika data kriteria kosong, tampilkan pesan
                const emptyMessage = document.createElement('span');
                emptyMessage.classList.add('namaBenefit', 'px-4', 'py-1', 'bg-red-200', 'text-sm', 'rounded-lg');
                emptyMessage.textContent = 'Mitra belum mengisikan data';
                benefitContainer.appendChild(emptyMessage);
            }

            // Tambahkan input hidden ke form
            registrationForm.appendChild(hiddenKegiatanInput);
        });
    });
    applyButton.addEventListener("click", () => {
        applyModal.classList.remove("opacity-0", "pointer-events-none");
        applyModal.querySelector(".transform").classList.remove("scale-95");
    });
    
    backButton.addEventListener("click", () => {
        detailContainer.classList.add("translate-y-full");
    });
    // Event untuk menutup modal
    closeModal.addEventListener('click', () => {
        applyModal.classList.add('opacity-0', 'pointer-events-none');
        applyModal.classList.remove('opacity-100');
    });

    // Event untuk menutup modal ketika klik di luar modal
    applyModal.addEventListener('click', (e) => {
        if (e.target === applyModal) {
        applyModal.classList.add('opacity-0', 'pointer-events-none');
        applyModal.classList.remove('opacity-100');
        }
    });
});

/* Profile user page */
// Modal setting user
document.addEventListener("DOMContentLoaded", () => {
    const modalSettingButton = document.getElementById("openModalSettingBtn");
    const modalSetting = document.getElementById("modalSetting");
    const closeModalSettingButton = document.getElementById(
        "closeModalSettingBtn"
    );
    const deleteProfilePictureButton =
        document.getElementById("deletePictureBtn");
    const alertDeleteProfilePicture = document.getElementById("deleteModal");
    const cancelDeleteButton = document.getElementById("cancelDeletePicture");
    const confirmDeleteButton = document.getElementById("confirmDeletePicture");

    modalSettingButton.addEventListener("click", function () {
        modalSetting.classList.remove("hidden");
        modalSetting.classList.add("flex");
    });

    closeModalSettingButton.addEventListener("click", function () {
        modalSetting.classList.add("hidden");
    });

    deleteProfilePictureButton.addEventListener("click", function () {
        alertDeleteProfilePicture.classList.remove("hidden");
        alertDeleteProfilePicture.classList.add("flex");
    });

    cancelDeleteButton.addEventListener("click", function () {
        alertDeleteProfilePicture.classList.add("hidden");
    });

    confirmDeleteButton.addEventListener("click", function () {
        modalSetting.classList.add("hidden");
    });
});

// Initialize and Function for tab navigation
document.addEventListener("DOMContentLoaded", function () {
    initializeModalSettingsTab();
    initializeTabProfile();

    function initializeModalSettingsTab() {
        const modalTabs = ["profile", "account", "contact"];

        modalTabs.forEach((tab) => {
            const modalButton = document.getElementById(`${tab}Btn`);
            if (modalButton) {
                modalButton.addEventListener("click", () =>
                    handleModalNavigationTabClick(tab, modalTabs)
                );
            }
        });
    }

    function handleModalNavigationTabClick(selectedModalTab, navigationTab) {
        navigationTab.forEach((tab) => {
            const contentElement = document.getElementById(`${tab}Content`);
            const buttonElement = document.getElementById(`${tab}Btn`);

            if (contentElement && buttonElement) {
                if (tab === selectedModalTab) {
                    contentElement.classList.remove("hidden");
                    buttonElement.classList.remove("border-transparent");
                    buttonElement.classList.add("bg-sky-100");
                    buttonElement.classList.add("border-sky-600");
                } else {
                    contentElement.classList.add("hidden");
                    buttonElement.classList.add("border-transparent");
                    buttonElement.classList.remove("bg-sky-100");
                    buttonElement.classList.remove("border-sky-600");
                }
            }
        });
    }

    function initializeTabProfile() {
        const profileTabs = ["about", "applied"];

        profileTabs.forEach((tab) => {
            const button = document.getElementById(`${tab}Btn`);
            button.addEventListener("click", () =>
                handleProfileNavigationTabClick(tab, profileTabs)
            );
        });
    }

    function handleProfileNavigationTabClick(
        selectedProfileTab,
        navigationProfileTab
    ) {
        navigationProfileTab.forEach((tab) => {
            const contentElement = document.getElementById(`${tab}Content`);
            const buttonElement = document.getElementById(`${tab}Btn`);

            if (tab === selectedProfileTab) {
                contentElement.classList.remove("hidden");
                buttonElement.classList.remove("border-transparent");
                buttonElement.classList.add("border-blue-500");
            } else {
                contentElement.classList.add("hidden");
                buttonElement.classList.add("border-transparent");
                buttonElement.classList.remove("border-blue-500");
            }
        });
    }
});

// Modal skill
document.addEventListener("DOMContentLoaded", function () {
    const openModalAddSkillButton = document.getElementById(
        "openModalAddSkillBtn"
    );
    const skillModal = document.getElementById("skillModal");
    const closeSkillModalButton = document.getElementById("closeModalSkillBtn");
    const deleteSkillButton = document.getElementById("deleteSkillBtn");
    const deleteSkillAlert = document.getElementById("deleteSkillAlert");
    const cancelDeleteSkillButton = document.getElementById("cancelDeleteSkillButton");
    const confirmDeleteSkillButton = document.getElementById("confirmDeleteSkillButton");
    let skillIdToDelete = null;

    openModalAddSkillButton.addEventListener("click", function () {
        skillModal.classList.remove("hidden");
        skillModal.classList.add("flex");
    });

    closeSkillModalButton.addEventListener("click", function () {
        skillModal.classList.add("hidden");
    });

    // Event Delegation untuk tombol delete skill
    document.addEventListener("click", function (event) {
        if (event.target.closest(".deleteSkillBtn")) {
            const deleteButton = event.target.closest(".deleteSkillBtn");
            const id = deleteButton.getAttribute("data-id-user");
            const id_skill = deleteButton.getAttribute("data-id-skill");

            console.log({ id, id_skill });

            if (id && id_skill) {
                // Update action pada form
                confirmDeleteSkillButton.action = `/user/${id}/remove-skill/${id_skill}`;
                console.log("Form action updated:", confirmDeleteSkillButton.action);

                // Tampilkan modal konfirmasi
                deleteSkillAlert.classList.remove("hidden");
                deleteSkillAlert.classList.add("flex");
            }
        }
    });

    // Cancel Delete Skill
    cancelDeleteSkillButton.addEventListener("click", function () {
        deleteSkillAlert.classList.add("hidden");
    });
});

// Modal experience
document.addEventListener("DOMContentLoaded", function () {
    const addExperienceButton = document.getElementById("addExperienceBtn");
    const addExperienceModal = document.getElementById("addExperienceModal");
    const closeAddExperienceModalButton = document.getElementById("closeAddModalExperienceBtn");
    const editExperienceBtn = document.querySelectorAll(".edit-experience-btn");
    const showExperienceModal = document.getElementById("editExperienceModal");
    const closeEditExperienceModalButton = document.getElementById("closeModalExperienceBtn");
    const deleteExperienceAlert = document.getElementById("deleteExperienceAlert");
    const confirmDeleteExperienceButton = document.getElementById("confirmDeleteExperience");
    const cancelDeleteExperienceButton = document.getElementById("cancelDeleteExperience");

    addExperienceButton.addEventListener("click", function () {
        addExperienceModal.classList.remove("hidden");
        addExperienceModal.classList.add("flex");
    });
    closeAddExperienceModalButton.addEventListener("click", function () {
        addExperienceModal.classList.add("hidden");
    });

    closeEditExperienceModalButton.addEventListener("click", function () {
        showExperienceModal.classList.add("hidden");
    });

    editExperienceBtn.forEach(button => {
            button.addEventListener("click", function () {
            const experienceId = this.getAttribute('data-id-experience');
            const userId = this.getAttribute('data-id');
            const judulKegiatan = this.getAttribute("data-judul-kegiatan");
            const mitra = this.getAttribute("data-mitra");
            const lokasiKegiatan = this.getAttribute("data-lokasi-kegiatan");
            const tglMulai = this.getAttribute("data-tgl-mulai");
            const tglSelesai = this.getAttribute("data-tgl-selesai");
            const deskripsi = this.getAttribute("data-deskripsi");

            document.getElementById("activityName").value = judulKegiatan;
            document.getElementById("company").value=mitra;
            document.getElementById("location").value=lokasiKegiatan;
            document.getElementById("startDate").value=tglMulai;
            document.getElementById("endData").value=tglSelesai;
            document.getElementById("description").value=deskripsi;

            const actionUrl = `/user/edit-experience/${userId}/${experienceId}`;
            document.getElementById('editExperienceAction').action = actionUrl;
            showExperienceModal.classList.remove("hidden");
            showExperienceModal.classList.add("flex");

            document.addEventListener("click", function (event) {
                if (event.target.closest(".delete-experience-btn")) {
                    const deleteButton = event.target.closest(".delete-experience-btn");
                    const id = deleteButton.getAttribute("data-id");
                    const id_experience = deleteButton.getAttribute("data-id-experience");
        
                    if (id && id_experience) {
                        // Update action pada form
                        confirmDeleteExperienceButton.action = `/user/remove-experience/${id}/${id_experience}`;
                        console.log("Form action updated:", confirmDeleteExperienceButton.action);
        
                        // Tampilkan modal konfirmasi
                        deleteExperienceAlert.classList.remove("hidden");
                        deleteExperienceAlert.classList.add("flex");
                    }
                }
            });

        });
    });

    // Event Delegation untuk tombol delete skill

    // deleteButtons.forEach(button => {
    //     button.addEventListener('click', () => {
    //         selectedExperienceId = button.getAttribute('data-id-experience');
    //         deleteExperienceAlert.classList.remove('hidden');
    //     });
    // });

    // // Konfirmasi Hapus
    // deleteExperienceButton.forEach(button => {
    //     button.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         const actionUrl = button.closest('form').getAttribute('action');
    //         confirmDeleteExperienceButton.setAttribute('action', actionUrl);
    //         deleteExperienceAlert.classList.remove('hidden');
    //         deleteExperienceAlert.classList.add("flex");
    //     });
    // });

    // deleteExperienceButton.addEventListener("click", function () {
    //     deleteExperienceAlert.classList.remove("hidden");
    //     deleteExperienceAlert.classList.add("flex");
    // });

    // confirmDeleteExperienceButton.addEventListener("click", function () {
    //     deleteExperienceAlert.classList.add("hidden");
    // });

    cancelDeleteExperienceButton.addEventListener("click", function () {
        deleteExperienceAlert.classList.add("hidden");
    });
});

// JAVASCRIPT DETAIL PROFILE USER
//More Deskripsi
document.getElementById('btn-more-desc').addEventListener('click', function (event) {
    const element = event.target;
    const parent = element.parentElement;
    const shortDesc = parent.querySelector('.short-desc');
    const moreDesc = parent.querySelector('.more-desc');

    if (moreDesc.classList.contains('hidden')) {
        shortDesc.classList.add('hidden');
        moreDesc.classList.remove('hidden');
        element.textContent = "Less";
    } else {
        shortDesc.classList.remove('hidden');
        moreDesc.classList.add('hidden');
        element.textContent = "More";
    }
});

// More Deskripsi Experience
document.querySelectorAll('.btn-more-desc-exp').forEach(button => {
    button.addEventListener('click', function (event) {
        const element = event.target;
        const parent = element.parentElement;
        const shortDesc = parent.querySelector('.short-desc');
        const moreDesc = parent.querySelector('.more-desc');

        if (moreDesc.classList.contains('hidden')) {
            shortDesc.classList.add('hidden');
            moreDesc.classList.remove('hidden');
            element.textContent = "Less";
        } else {
            shortDesc.classList.remove('hidden');
            moreDesc.classList.add('hidden');
            element.textContent = "More";
        }
    });
});

document.getElementById('changePictureBtn').addEventListener('click', function () {
    // Klik otomatis pada input file
    document.getElementById('uploadPictureInput').click();
});

document.getElementById('uploadPictureInput').addEventListener('change', function () {
    // Submit form secara otomatis jika file dipilih
    if (this.files && this.files[0]) {
        // Tampilkan pratinjau gambar (opsional)
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profilePicture').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);

        // Submit form
        document.getElementById('updateProfilePictureForm').submit();
    }
});