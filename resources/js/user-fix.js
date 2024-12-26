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
          mobileMenu.classList.add("-translate-y-[calc(100%+5rem)]", "opacity-0");
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
  
  // Showing detail volunteer in small screen
  document.addEventListener("DOMContentLoaded", () => {
    const volunteerCard = document.getElementById("volunteerCard");
    const detailVolunteerCard = document.getElementById("detailVolunteer");
    const backButton = document.getElementById("backBtn");
  
    volunteerCard.addEventListener("click", () => {
      detailVolunteerCard.classList.remove("translate-y-full");
    });
  
    backButton.addEventListener("click", () => {
      detailVolunteerCard.classList.add("translate-y-full");
    });
  });

  // Modal aplly volunteer
  document.addEventListener("DOMContentLoaded", () => {
    const applyButton = document.getElementById("applyBtn");
    const submitButton = document.getElementById("submitBtn");
    const applyModal = document.getElementById("applyMdl");
    const closeModal = document.getElementById("closeApplyMdl");
    const notification = document.getElementById("notification");
  
    applyButton.addEventListener("click", () => {
      applyModal.classList.remove("opacity-0", "pointer-events-none");
      applyModal.querySelector(".transform").classList.remove("scale-95");
    });
  
    closeModal.addEventListener("click", () => {
      applyModal.classList.add("opacity-0", "pointer-events-none");
      applyModal.querySelector(".transform").classList.add("scale-95");
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
      const profileTabs = ["about", "activity", "applied", "favorite"];
  
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
    const confirmDeleteSkillButton =
      document.getElementById("confirmDeleteSkill");
    const cancelDeleteSkillButton = document.getElementById("cancelDeleteSkill");
  
    openModalAddSkillButton.addEventListener("click", function () {
      skillModal.classList.remove("hidden");
      skillModal.classList.add("flex");
    });
  
    closeSkillModalButton.addEventListener("click", function () {
      skillModal.classList.add("hidden");
    });
  
    deleteSkillButton.addEventListener("click", function () {
      deleteSkillAlert.classList.remove("hidden");
      deleteSkillAlert.classList.add("flex");
    });
  
    confirmDeleteSkillButton.addEventListener("click", function () {
      deleteSkillAlert.classList.add("hidden");
    });
  
    cancelDeleteSkillButton.addEventListener("click", function () {
      deleteSkillAlert.classList.add("hidden");
    });
  });
  
  // Modal experience
  document.addEventListener("DOMContentLoaded", function () {
    const addExperienceButton = document.getElementById("addExperienceBtn");
    const addExperienceModal = document.getElementById("addExperienceModal");
    const closeAddExperienceModalButton = document.getElementById(
      "closeAddModalExperienceBtn"
    );
    const editExperienceButton = document.getElementById("editExperienceBtn");
    const editExperienceModal = document.getElementById("editExperienceModal");
    const closeEditExperienceModalButton = document.getElementById(
      "closeModalExperienceBtn"
    );
  
    const deleteExperienceButton = document.getElementById("deleteExperienceBtn");
    const deleteExperienceAlert = document.getElementById(
      "deleteExperienceAlert"
    );
    const confirmDeleteExperienceButton = document.getElementById(
      "confirmDeleteExperience"
    );
    const cancelDeleteExperienceButton = document.getElementById(
      "cancelDeleteExperience"
    );
    const closeExperienceModalButton = document.getElementById(
      "closeModalExperience"
    );
  
    addExperienceButton.addEventListener("click", function () {
      addExperienceModal.classList.remove("hidden");
      addExperienceModal.classList.add("flex");
    });
  
    closeAddExperienceModalButton.addEventListener("click", function () {
      addExperienceModal.classList.add("hidden");
    });
  
    editExperienceButton.addEventListener("click", function () {
      editExperienceModal.classList.remove("hidden");
      editExperienceModal.classList.add("flex");
    });
  
    closeEditExperienceModalButton.addEventListener("click", function () {
      editExperienceModal.classList.add("hidden");
    });
  
    deleteExperienceButton.addEventListener("click", function () {
      deleteExperienceAlert.classList.remove("hidden");
      deleteExperienceAlert.classList.add("flex");
    });
  
    confirmDeleteExperienceButton.addEventListener("click", function () {
      deleteExperienceAlert.classList.add("hidden");
    });
  
    cancelDeleteExperienceButton.addEventListener("click", function () {
      deleteExperienceAlert.classList.add("hidden");
    });
  });
  