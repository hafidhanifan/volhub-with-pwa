document.addEventListener('DOMContentLoaded', function() {
  // Sembunyikan semua konten kecuali "in-review"
  document.querySelectorAll('.content-section').forEach(function(section) {
    section.style.display = 'none';
  });

  // Tampilkan hanya "in-review" secara default
  const applicantProfile = document.getElementById('applicant-profile');
  applicantProfile.style.display = 'flex';
  applicantProfile.style.flexDirection = 'column';
  applicantProfile.style.gap = '20px';

  // Tambahkan kelas .active ke menu "In-Review"
  document.querySelector('.button_menu_pendaftaran a[data-target="applicant-profile"]').classList.add('active');
});

document.querySelectorAll('.button_menu_pendaftaran a').forEach(function(anchor) {
  anchor.addEventListener('click', function(event) {
    event.preventDefault();

    // Hapus kelas 'active' dari semua link navigasi
    document.querySelectorAll('.button_menu_pendaftaran a').forEach(function(link) {
      link.classList.remove('active');
    });

    // Tambahkan kelas 'active' ke link yang diklik
    anchor.classList.add('active');

    // Sembunyikan semua konten
    document.querySelectorAll('.content-section').forEach(function(section) {
      section.style.display = 'none';
    });

    // Tampilkan konten yang sesuai
    var targetId = anchor.getAttribute('data-target');
    var targetElement = document.getElementById(targetId);
    if (targetElement) {
      if (targetId === 'applicant-profile') {
        // Jika konten adalah "Applicant Profile", gunakan display flex dengan pengaturan khusus
        targetElement.style.display = 'flex';
        targetElement.style.flexDirection = 'column';
        targetElement.style.gap = '20px';
      } else {
        // Untuk konten lainnya, tampilkan dengan display block
        targetElement.style.display = 'block';
      }
    }
  });
});

  function toggleText(element) {
    var shortText = element.previousElementSibling.previousElementSibling;
    var moreText = element.previousElementSibling;
    
    if (moreText.style.display === "none") {
        shortText.style.display = "none";
        moreText.style.display = "inline";
        element.textContent = "Less";
    } else {
        shortText.style.display = "inline";
        moreText.style.display = "none";
        element.textContent = "More";
    }
}


function toggleExperience() {
  var additionalExperiences = document.querySelectorAll('.additional-experience');
  var showMoreButton = document.querySelector('.show-more-container a');

  additionalExperiences.forEach(function(experience) {
      if (experience.classList.contains('show')) {
          experience.classList.remove('show');
          showMoreButton.textContent = "Show More Experience";
          experience.style.display = "none";  // Sembunyikan elemen
      } else {
          experience.classList.add('show');
          showMoreButton.textContent = "Show Less Experience";
          experience.style.display = "flex";  // Tampilkan elemen dengan display: flex
      }
  });
}

function toggleTextDesc(element) {
  var shortDesc = element.previousElementSibling.previousElementSibling;
  var moreDesc = element.previousElementSibling;
  
  if (moreDesc.style.display === "none") {
      shortDesc.style.display = "none";
      moreDesc.style.display = "inline";
      element.textContent = "Less";
  } else {
      shortDesc.style.display = "inline";
      moreDesc.style.display = "none";
      element.textContent = "More";
  }
}

function toggleNote(element) {
  var shortNote = element.previousElementSibling.previousElementSibling;
  var moreNote = element.previousElementSibling;

  if (moreNote.style.display === "none" || moreNote.style.display === "") {
      shortNote.style.display = "none";
      moreNote.style.display = "inline";
      element.textContent = "Less";
  } else {
      shortNote.style.display = "inline";
      moreNote.style.display = "none";
      element.textContent = "More";
  }
}

/*Copy Email */
document.getElementById("copy-button").addEventListener("click", function() {
  // Pilih elemen teks yang akan disalin
  var textToCopy = document.getElementById("text-to-copy").innerText;

  // Gunakan API Clipboard untuk menyalin teks ke clipboard
  navigator.clipboard.writeText(textToCopy).then(function() {
    alert("Teks berhasil disalin ke clipboard!");
  }).catch(function(error) {
    alert("Gagal menyalin teks: " + error);
  });
});

/*Pendaftaran Hiring*/
document.addEventListener('DOMContentLoaded', function() {
  // Sembunyikan semua konten kecuali "in-review"
  document.querySelectorAll('.content-section-hiring').forEach(function(section) {
    section.style.display = 'none';
  });

  // Tampilkan hanya "in-review" secara default
  const applicantProfile = document.getElementById('in-review');
  applicantProfile.style.display = 'flex';
  applicantProfile.style.flexDirection = 'column';
  applicantProfile.style.gap = '20px';

  // Tambahkan kelas .active ke menu "In-Review"
  document.querySelector('.button_menu_hiring_stage a[data-target="in-review"]').classList.add('active');

  // Tambahkan event listener ke tombol Shortlist
  const shortlistButton = document.getElementById('shortlistActionBtn');
  shortlistButton.addEventListener('click', function() {
    // Tampilkan bagian "Shortlisted"
    document.querySelectorAll('.content-section-hiring').forEach(function(section) {
      section.style.display = 'none';
    });

    const shortlistedSection = document.getElementById('shortlisted');
    shortlistedSection.style.display = 'block';

    // Tambahkan kelas .active ke menu "Shortlisted"
    document.querySelectorAll('.button_menu_hiring_stage a').forEach(function(link) {
      link.classList.remove('active');
    });
    document.querySelector('.button_menu_hiring_stage a[data-target="shortlisted"]').classList.add('active');
    });

  // Tambahkan event listener ke tombol Shortlist
  const interviewButton = document.getElementById('interviewAction');
  interviewButton.addEventListener('click', function() {
    // Tampilkan bagian "Shortlisted"
    document.querySelectorAll('.content-section-hiring').forEach(function(section) {
      section.style.display = 'none';
    });

    const InterviewSection = document.getElementById('interview');
    InterviewSection.style.display = 'block';

    // Tambahkan kelas .active ke menu "Shortlisted"
    document.querySelectorAll('.button_menu_hiring_stage a').forEach(function(link) {
      link.classList.remove('active');
    });
    document.querySelector('.button_menu_hiring_stage a[data-target="interview"]').classList.add('active');
    });

  });


document.querySelectorAll('.button_menu_hiring_stage a').forEach(function(anchor) {
  anchor.addEventListener('click', function(event) {
    event.preventDefault();

    // Hapus kelas 'active' dari semua link navigasi
    document.querySelectorAll('.button_menu_hiring_stage a').forEach(function(link) {
      link.classList.remove('active');
    });

    // Tambahkan kelas 'active' ke link yang diklik
    anchor.classList.add('active');

    // Sembunyikan semua konten
    document.querySelectorAll('.content-section-hiring').forEach(function(section) {
      section.style.display = 'none';
    });

    // Tampilkan konten yang sesuai
    var targetId = anchor.getAttribute('data-target');
    var targetElement = document.getElementById(targetId);
    if (targetElement) {
      if (targetId === 'in-review') {
        // Jika konten adalah "in-review", gunakan display flex dengan pengaturan khusus
        targetElement.style.display = 'flex';
        targetElement.style.flexDirection = 'column';
        targetElement.style.gap = '20px';
      } else {
        // Untuk konten lainnya, tampilkan dengan display block
        targetElement.style.display = 'block';
      }
    }
  });
});


// // Modal Schedule
// const openModalSchedule = document.getElementById("openModalSchedule");
// const modalSchdule = document.getElementById("modalSchdule");
// const closeModalSchedule = document.getElementById("closeModalSchedule");

// if (openModalSchedule) {
//     openModalSchedule.addEventListener("click", () => {
//       modalSchdule.style.display = "block";
//     });
// }

// if (closeModalSchedule) {
//     closeModalSchedule.addEventListener("click", () => {
//       modalSchdule.style.display = "none";
//     });
// }

// window.addEventListener("click", (event) => {
//     if (event.target == modalSchdule) {
//       modalSchdule.style.display = "none";
//     }
// });

// Modal Add Note
const openModalAddNote = document.getElementById("openModalAddNote");
const modalAddNote = document.getElementById("modalAddNote");
const closeModalAddNote = document.getElementById("closeModalAddNote");

if (openModalAddNote) {
    openModalAddNote.addEventListener("click", () => {
      modalAddNote.style.display = "block";
    });
}

if (closeModalAddNote) {
    closeModalAddNote.addEventListener("click", () => {
      modalAddNote.style.display = "none";
    });
}

window.addEventListener("click", (event) => {
    if (event.target == modalAddNote) {
      modalAddNote.style.display = "none";
    }
});

// Modal Hire Note 
// const openModalHireNote = document.getElementById("openModalHireNote");
// const openModalHireShortlist = document.getElementById("openModalHireShortlist");
// const openModalHireNoteInterview = document.getElementById("openModalHireNoteInterview");
// const modalHireNote = document.getElementById("modalHireNote");
// const closeHireNote = document.getElementById("closeHireNote");

// if (openModalHireNote) {
//     openModalHireNote.addEventListener("click", () => {
//       modalHireNote.style.display = "block";
//     });
// }

// if (openModalHireShortlist) {
//     openModalHireShortlist.addEventListener("click", () => {
//       modalHireNote.style.display = "block";
//   });
// }

// if (openModalHireNoteInterview) {
//     openModalHireNoteInterview.addEventListener("click", () => {
//       modalHireNote.style.display = "block";
//   });
// }

// if (closeHireNote) {
//     closeHireNote.addEventListener("click", () => {
//       modalHireNote.style.display = "none";
//     });
// }

// window.addEventListener("click", (event) => {
//     if (event.target == modalHireNote) {
//       modalHireNote.style.display = "none";
//     }
// });

// Modal Reject Note 
// const openModalRejectNote = document.getElementById("openModalRejectNote");
// const openModalRejectShortlist = document.getElementById("openModalRejectShortlist");
// const openModalRejectInterview = document.getElementById("openModalRejectInterview");
// const modalRejectNote = document.getElementById("modalRejectNote");
// const closeRejectNote = document.getElementById("closeRejectNote");

// if (openModalRejectNote) {
//     openModalRejectNote.addEventListener("click", () => {
//       modalRejectNote.style.display = "block";
//     });
// }

// if (openModalRejectShortlist) {
//     openModalRejectShortlist.addEventListener("click", () => {
//       modalRejectNote.style.display = "block";
//   });
// }

// if (openModalRejectInterview) {
//     openModalRejectInterview.addEventListener("click", () => {
//       modalRejectNote.style.display = "block";
//   });
// }

// if (closeRejectNote) {
//     closeRejectNote.addEventListener("click", () => {
//       modalRejectNote.style.display = "none";
//     });
// }

// window.addEventListener("click", (event) => {
//     if (event.target == modalHireNote) {
//       modalRejectNote.style.display = "none";
//     }
// });









document.addEventListener('DOMContentLoaded', function () {
  const shortlistButton = document.getElementById('shortlistActionBtn');

  // Ambil nilai data-target dari tombol
  const target = shortlistButton.dataset.target;
  console.log(target); // Output: "shortlisted"
});

$(document).ready(function() {
  // Shortlist Action
  $('#shortlistActionBtn').on('click', function() {
    var $form = $('#shortlistForm');
    var url = $form.attr('action');
    var data = $form.serialize();
    var $button = $(this);

    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        // Update button text or perform other actions on success
        $button.text('Shortlisted').prop('disabled', true).addClass('btn-success');
        
        // Update style dynamically
        $button.css({
          'color': 'gray',
          'opacity': '0.5',
          'pointer-events': 'none'
        });

        // Update the shortlisted-info section
        $('.shortlisted-info').html('This applicant is currently <b>shortlisted.</b> You have <b>' + response.sisa_hari + ' days remaining</b> before the activity closes.');

        // Optionally hide or show other sections
        $('#shortlisted').show(); // Show the shortlisted section
        $('#in-review').hide(); // Hide the in-review section
      },
      error: function(xhr) {
        // Handle errors (e.g., show an error message on the page)
        $('#error-message').text('An error occurred. Please try again.').show();
      }
    });
  });

  // Interview Action
  $('#interviewAction').on('click', function() {
    var $form = $('#interviewForm');
    var url = $form.attr('action');
    var data = $form.serialize();
    var $button = $(this);

    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        // Update button text or perform other actions on success
        $button.text('Interviewed').prop('disabled', true).addClass('btn-success');
        
        // Update style dynamically
        $button.css({
          'color': 'gray',
          'opacity': '0.5',
          'pointer-events': 'none'
        });

        // Disable the Shortlisted button
        $('#shortlistActionBtn').prop('disabled', true).css({
          'color': 'gray',
          'opacity': '0.5',
          'pointer-events': 'none'
        }).addClass('btn-secondary');

        // Update other sections if necessary
        $('#shortlisted').hide();
        $('#interview').show(); // Assuming you have an interview section to show
      },
      error: function(xhr) {
        // Handle errors (e.g., show an error message on the page)
        $('#error-message').text('An error occurred. Please try again.').show();
      }
    });
  });

});

// Menangani semua tombol hire 
document.querySelectorAll('.hire-button').forEach(function(button) {
  button.addEventListener('click', function() {
      document.getElementById('modalHireNote').style.display = 'block';
  });
});

// Tutup modal saat tombol close diklik
if (closeHireNote) {
  closeHireNote.addEventListener('click', function() {
      document.getElementById('modalHireNote').style.display = 'none';
  });
}

// Tutup modal saat mengklik area luar modal
window.addEventListener('click', function(event) {
  if (event.target == document.getElementById('modalHireNote')) {
      document.getElementById('modalHireNote').style.display = 'none';
  }
});

// Mengirim data form dengan AJAX tanpa reload
$('#hireAction').on('click', function(e) {
  e.preventDefault(); // Mencegah submit form standar

  var $form = $('#hireForm');
  var url = $form.attr('action');
  var data = $form.serialize();
  var $button = $(this);

  $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
          // Update tombol hire
          $button.text('Hired').prop('disabled', true).addClass('btn-success');
          $button.css({
              'color': 'gray',
              'opacity': '0.5',
              'pointer-events': 'none'
          });

          // Disable tombol hire lainnya di section yang sama
          $('.hire-button, .declined-button').prop('disabled', true).css({
              'color': 'gray',
              'opacity': '0.5',
              'pointer-events': 'none'
          });

          // Disable tombol Shortlist, Interview, dan Schedule lainnya
        $('#shortlistActionBtn, #interviewAction, #openModalSchedule').prop('disabled', true).css({
          'color': 'gray',
          'opacity': '0.5',
          'pointer-events': 'none'
          }).addClass('btn-secondary');

          // Update other sections if necessary
          $('#in-review, #shortlisted, #interview').hide();
          $('#hiredOrReject').show(); // Assuming you have a hired-or-reject section to show

          // Tutup modal setelah sukses
          document.getElementById('modalHireNote').style.display = 'none';
      },
      error: function(xhr) {
          // Menangani kesalahan jika ada
          $('#error-message').text('An error occurred. Please try again.').show();
      }
  });
});



// Menangani semua tombol Reject 
document.querySelectorAll('.declined-button').forEach(function(button) {
  button.addEventListener('click', function() {
      document.getElementById('modalRejectNote').style.display = 'block';
  });
});

// Tutup modal saat tombol close diklik
if (closeRejectNote) {
  closeRejectNote.addEventListener('click', function() {
      document.getElementById('modalRejectNote').style.display = 'none';
  });
}

// Tutup modal saat mengklik area luar modal
window.addEventListener('click', function(event) {
  if (event.target == document.getElementById('modalRejectNote')) {
      document.getElementById('modalRejectNote').style.display = 'none';
  }
});

// Mengirim data form dengan AJAX tanpa reload
$('#rejectAction').on('click', function(e) {
  e.preventDefault(); // Mencegah submit form standar

  var $form = $('#rejectForm');
  var url = $form.attr('action');
  var data = $form.serialize();
  var $button = $(this);

  $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        // Update tombol reject
        $button.text('Rejected').prop('disabled', true).addClass('btn-success');
        $button.css({
            'color': 'gray',
            'opacity': '0.5',
            'pointer-events': 'none'
        });
    
        // Disable tombol hire lainnya di section yang sama
        $('.hire-button, .declined-button').prop('disabled', true).css({
            'color': 'gray',
            'opacity': '0.5',
            'pointer-events': 'none'
        });
    
        // Disable tombol Shortlist, Interview, dan Schedule lainnya
        $('#shortlistActionBtn, #interviewAction, #openModalSchedule').prop('disabled', true).css({
            'color': 'gray',
            'opacity': '0.5',
            'pointer-events': 'none'
        }).addClass('btn-secondary');
    
        // Update section tampilan
        $('#in-review, #shortlisted, #interview').hide();
        $('#hiredOrReject').show(); // Assuming you have a hired-or-reject section to show

        // Update status interview
        if (response.interviewStatus === 'Interview Completed') {
          $('.interview-information-isi-status p').text('Interview Completed').removeClass().addClass('status-completed');
        } else {
            $('.interview-information-isi-status p').text('Not scheduled yet').removeClass().addClass('status-not-scheduled');
        }
    
        // Tutup modal setelah sukses
        document.getElementById('modalRejectNote').style.display = 'none';
    },
  });
});




// Menangani semua tombol Schedule 

document.querySelectorAll('.schedule-button').forEach(function(button) {
  button.addEventListener('click', function() {
      document.getElementById('modalSchdule').style.display = 'block';
  });
});

// Tutup modal saat tombol close diklik
if (closeModalSchedule) {
  closeModalSchedule.addEventListener('click', function() {
      document.getElementById('modalSchdule').style.display = 'none';
  });
}

// Tutup modal saat mengklik area luar modal
window.addEventListener('click', function(event) {
  if (event.target == document.getElementById('modalSchdule')) {
      document.getElementById('modalSchdule').style.display = 'none';
  }
});

$('#scheduleForm').on('submit', function(e) {
  e.preventDefault(); // Prevent form's default submit action

  var $form = $(this);
  var url = $form.attr('action');
  var method = $form.find('input[name="_method"]').length ? 'PUT' : 'POST'; // Determine HTTP method
  var data = $form.serialize();

  if (method === 'PUT') {
    // If the method is PUT, use AJAX to submit the form
    $.ajax({
      url: url,
      type: method, // Use the determined method (PUT)
      data: data,
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          console.log(response);
          console.log(response.status_interview); 
          // Update the interview location and date with the new data
          $('#interview-location').text(response.lokasi_interview);
          $('#interview-date').text(response.tgl_interview); // This will now display the formatted date
          $('#status_interview').text(response.status_interview);

          // Update the class based on the status
          $('#status_interview').removeClass().addClass(
            response.status_interview === 'Interview Completed' ? 'status-completed' :
            response.status_interview === 'On progress' ? 'status-on-progress' :
            response.status_interview === 'Not scheduled yet' ? 'status-not-scheduled' : 'status-default' // Add default value if none match
          );

          // Hide other sections and show interview section
          $('#in-review, #shortlisted').hide();
          $('#interview').show();

          // Close modal
          $('#modalSchdule').hide();
        } else {
          // Display error message if any
          $('#error-message').text(response.message || 'An error occurred. Please try again.').show();
        }
      },
      error: function(xhr, status, error) {
        // Handle AJAX errors
        $('#error-message').text('An error occurred. Please try again.').show();
      }
    });
  } else {
    // If the method is POST, allow form to reload the page
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          window.location.reload(); // Kembali ke halaman sebelumnya
        } else {
          $('#error-message').text(response.message || 'Terjadi kesalahan. Silakan coba lagi.').show();
        }
      },
      error: function(xhr, status, error) {
        $('#error-message').text('Terjadi kesalahan. Silakan coba lagi.').show();
      }
    });
  }
});






