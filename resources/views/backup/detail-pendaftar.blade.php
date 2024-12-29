@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.navbar') 
<!-- ========== section start ========== -->
<section class="section">
        <div class="container-fluid">

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Informasi Pendaftar</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="informasi-pendaftaran__wrapper">

            <div class="row informasi_pendaftaran_card">
                <div class="invoice-card card-style mb-30">
                    <div class="detail_profile_pendaftar">
                      <img class="detail_foto_profile" src="{{asset('storage/foto-profile/'.$pendaftar->user->foto_profile)}}" alt="Profile">
                      <div class="detail_profile_identity">
                        <p class="detail_profile_name">{{$pendaftar->user->nama_user}}</p>
                        <p class="detail_profile_bio">{{$pendaftar->user->bio}}</p>
                      </div>  
                    </div>
                  <div class="informasi_kegiatan_pendaftar">
                    <div class="informasi_kegiatan_pendaftar_judul">
                      <h3>Applied Volunteer</h3>
                      <p>{{ $daysAgo }} ago</p>
                    </div>
                    <hr class="hr_informasi_kegiatan">
                    <div class="informasi_kegiatan_pendaftar_isi">
                      <p>{{$pendaftar->kegiatan->nama_kegiatan}}</p>
                      {{-- <p>{{$kegiatans->mitra->nama_mitra}}</p> --}}
                    </div>
                  </div>
                  <div class="informasi_pendaftar_button">
                    <div class="button_schedule">
                      <button type="button" class="schedule-button" id="openModalSchedule" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="interview"
                        style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                        @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                        {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Scheduled' : 'Schedule' }}
                      </button>
                        <i class="button_message fa-regular fa-comment-dots"></i>
                    </div>
                  </div>
                  <hr class="informasi_pendaftaran_hr">
                  <div class="informasi_kontak_pendaftar"> 
                    <h3>Contact</h3>
                    <div class="kontak_pendaftar_wrap">

                      <div class="kontak_pendaftar_card">
                        <div class="kontak_pendaftaran_icon">
                          <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="kontak_pendaftar">
                          <span>Email</span>
                          <h3>{{$pendaftar->user->email_user}}</h3>
                        </div>
                      </div>

                      <div class="kontak_pendaftar_card">
                        <div class="kontak_pendaftaran_icon">
                          <i class="fa-solid fa-mobile-screen"></i>
                        </div>
                        <div class="kontak_pendaftar">
                          <span>Phone</span>
                          <h3>{{$pendaftar->user->nomor_telephone}}</h3>
                        </div>
                      </div>

                    </div>
                  </div>
              </div>
            </div>

             {{-- MODAL SCHEDULE --}}
              <div id="modalSchdule" class="modal__interview">
                <div class="modal__schedule">
                  <div class="modal__headerSchedule">
                    <span id="closeModalSchedule" class="close">&times;</span>
                    <h3>Schedule Interview</h3>
                  </div>
                  <div class="modal__formSchedule">
                    <form id="scheduleForm" action="{{ route('mitra.add-interview-action', ['id_pendaftar' => $pendaftar->id_pendaftar]) }}" method="POST" class="schedule-interview-form">
                      @csrf
                      
                      <div class="schedule-interview-information">
                        <div class="interview-date-form">
                          <label>Interview Date</label>
                          <input type="date" name="tgl_interview" value="{{ isset($pendaftar->tgl_interview) ? $pendaftar->tgl_interview : '' }}" />
                        </div>
                        <div class="interview-location-form">
                          <label>Interview Location</label>
                          <textarea rows="3" name="lokasi_interview">{{ old('lokasi_interview', isset($pendaftar->tgl_interview) ? $pendaftar->lokasi_interview : '') }}</textarea>
                        </div>
                      </div>
                      <button type="submit" class="main-btn-kategori primary-btn rounded btn-hover right-align" id="scheduleAction">
                        {{ isset($pendaftar->tgl_interview) ? 'Update Schedule' : 'Set Schedule' }}
                      </button>
                    </form>
                  </div>
                </div>
              </div>


            <div class="row informasi_pendaftaran_menu">
              <div class="invoice-card card-style mb-30">
                <div class="button_menu_pendaftaran">
                  <ul class="nav">
                    <li><a href="/applicant-profile" class="nav-applicant" data-target="applicant-profile">Applicant Profile</a></li>
                    <li><a href="/applicant-progress" class="nav-applicant" data-target="applicant-progress">Hiring Progress</a></li>
                  </ul>
                </div>
                <div id="applicant-profile" class="content-section show">
                  <div class="applicant-profile-information">
                    <div class="applicant-profile">
                      <h3>{{$pendaftar->user->nama_user}}</h3>
                      <i class="fa-brands fa-linkedin"></i>
                    </div>
                    <div class="applicant-profile-personal">
                      <div class="applicant-profile-personal-info">
                        <p>Email</p>
                        <div class="applicant-profile-personal__info">
                          <h3 id="text-to-copy">{{$pendaftar->user->email_user}}</h3>
                          <i id="copy-button" class="fa-regular fa-copy"></i>
                        </div>
                      </div>
                      <hr class="divider">
                      <div class="applicant-profile-personal-info">
                        <p>Rank</p>
                        <div class="applicant-profile-personal__info-rank">
                          <h3>Champion</h3>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="applicant-profile-info-about">
                    <div class="applicant-profile-about">
                      <h3>About</h3>
                    </div>
                    <div class="applicant-profile-about">
                      <div class="applicant-profile-about-info">
                        <p>
                          <span class="short-text">{{ Str::limit($pendaftar->user->deskripsi, 100, '...') }}</span>
                          <span class="more-text" style="display: none;">{{ $pendaftar->user->deskripsi }}</span>
                          <a href="javascript:void(0);" onclick="toggleText(this)" class="read-more">More</a>
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="applicant-profile-info-about">
                    <div class="applicant-profile-about">
                      <h3>Skill</h3>
                    </div>
                    <div class="applicant-profile-about">
                      <div class="applicant-profile-skill-info">
                          <?php $no = 1 ?>
                          @foreach($pendaftar->user->skills as $skill)
                          <div class="application-profile-skill-list">
                            <p>{{$skill->nama_skill}}</p>
                          </div>
                          @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="applicant-profile-info-lastActivity">

                    <div class="applicant-profile-lastActivity">
                      <h3>Last Activity</h3>
                    </div>

                    <div class="applicant-profile-lastActivity">
                      <?php $no = 1 ?>
                      @php
                          $hasAcceptedExperience = $acceptedExperienceCount > 0;
                      @endphp
                  
                      @foreach($acceptedKegiatans as $index => $kegiatan)
                          @if($index == 0)
                              <div class="applicant-profile-lastActivity-info">
                                  <img class="detail_foto_profile" src="{{ asset('storage/logo/'.$kegiatan->mitra->logo) }}" alt="Logo Mitra">
                                  <div class="detail_mitra_identity">
                                      <p class="detail_mitra_kegiatan">{{ $kegiatan->nama_kegiatan }}</p>
                                      <p class="detail_mitra_name">{{ $kegiatan->mitra->nama_mitra }}</p>
                                      <p class="detail_mitra_desc">
                                          @if(strlen($kegiatan->deskripsi) > 100)
                                              <span class="short-desc">{{ Str::limit($kegiatan->deskripsi, 50, '...') }}</span>
                                              <span class="more-desc" style="display: none;">{{ $kegiatan->deskripsi }}</span>
                                              <a href="javascript:void(0);" class="more" onclick="toggleTextDesc(this)">More</a>
                                          @else
                                              {{ $kegiatan->deskripsi }}
                                          @endif
                                      </p>
                                  </div>
                              </div>
                          @else
                              <div class="applicant-profile-lastActivity-info additional-experience">
                                  <img class="detail_foto_profile" src="{{ asset('storage/logo/'.$kegiatan->mitra->logo) }}" alt="Logo Mitra">
                                  <div class="detail_mitra_identity">
                                      <p class="detail_mitra_kegiatan">{{ $kegiatan->nama_kegiatan }}</p>
                                      <p class="detail_mitra_name">{{ $kegiatan->mitra->nama_mitra }}</p>
                                      <p class="detail_mitra_desc">
                                          @if(strlen($kegiatan->deskripsi) > 100)
                                              <span class="short-desc">{{ Str::limit($kegiatan->deskripsi, 50, '...') }}</span>
                                              <span class="more-desc" style="display: none;">{{ $kegiatan->deskripsi }}</span>
                                              <a href="javascript:void(0);" class="more" onclick="toggleTextDesc(this)">More</a>
                                          @else
                                              {{ $kegiatan->deskripsi }}
                                          @endif
                                      </p>
                                  </div>
                              </div>
                          @endif
                      @endforeach
                  
                      @if(!$hasAcceptedExperience)
                          <p class="no-experience">The applicant has no experience data.</p>
                      @elseif($hasAcceptedExperience && $acceptedExperienceCount > 1)
                          <div class="show-more-container">
                              <a class="more" href="javascript:void(0);" onclick="toggleExperience()">Show More Experience</a>
                          </div>
                      @endif
                    </div>
                  </div> 
                </div>
                
                <div id="applicant-progress" class="content-section show">
                  <div class="applicant-hiring-information">
                    <h3>Current Stage</h3>
                    <div class="button_menu_hiring_stage">
                      <ul class="progress-bar">
                        <li class="progress-item"><a href="/in-review" data-target="in-review" id="inReviewBtn">In-Review</a></li>
                        <li class="progress-item"><a href="/shortlisted" data-target="shortlisted" id="shortlistedBtn" disabled>Shortlisted</a></li>
                        <li class="progress-item"><a href="/interview" data-target="interview" id="interviewBtn"disabled>Interview</a></li>
                        <li class="progress-item"><a href="/hiredOrReject" data-target="hiredOrReject" id="hiredRejectBtn">Hired / Reject</a></li>
                      </ul>
                    </div>

                    <div id="in-review" class="content-section-hiring show">
                      <p class="stage-info-hiring">Stage Info</p>
                      <div class="in-review-information">
                        <div class="in-review-information-motivasi">
                          <div class="applicant-profile-about">
                            <h3>Motivation</h3>
                          </div>
                          <div class="applicant-profile-about">
                            <div class="applicant-profile-about-info">
                              <p>
                                <span class="short-text">{{ Str::limit($pendaftar->motivasi, 100, '...') }}</span>
                                <span class="more-text" style="display: none;">{{ $pendaftar->motivasi }}</span>
                                @if (Str::length($pendaftar->motivasi) > 100)
                                  <a href="javascript:void(0);" onclick="toggleText(this)" class="read-more">More</a>
                                @endif
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="in-review-information-cv">
                          <div class="applicant-profile-about">
                            <h3>Curriculum Vitae</h3>
                          </div>
                          <div class="applicant-profile-about">
                            <div class="applicant-profile-about-info">
                              <a href="{{ asset('storage/cv/' . $pendaftar->user->cv) }}" target="_blank" class="in-review-cv-download d-flex align-items-center text-primary text-decoration-none" download>
                                <i class="fa-regular fa-file-pdf"></i> 
                                <p>{{$pendaftar->user->cv}}</p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="informasi_pendaftaran-next-step">
                        <div class="button_next-step-all">
                          <div class="button_next-step">
                            <form id="shortlistForm" action="{{ route('applicant.shortlist', ['id' => $mitra->id_mitra, 'id_pendaftar' => $pendaftar->id_pendaftar]) }}" method="POST">
                              @csrf
                              <button type="button" class="next-step-button" id="shortlistActionBtn" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="shortlisted" 
                                style="{{ in_array($pendaftar->status_applicant, ['Shortlist', 'Interview', 'Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                                @if (in_array($pendaftar->status_applicant, ['Shortlist', 'Interview', 'Hire', 'Reject'])) disabled @endif>
                                {{ in_array($pendaftar->status_applicant, ['Shortlist', 'Interview', 'Hire', 'Reject']) ? 'Shortlisted' : 'Shortlist' }}
                              </button>
                            </form>
                              <button class="hire-button" id="openModalHireNote" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                                style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                                @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                                {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Hired' : 'Hire' }}
                              </button>
                          </div>
                          <button class="declined-button" id="openModalRejectNote" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                            style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                            @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                            {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Rejected' : 'Reject' }}
                          </button>
                        </div>
                      </div>
                    </div>

                    <div id="shortlisted" class="content-section-hiring show">
                      <p class="stage-info-hiring">Stage Info</p>
                      <div class="shortlisted-information">
                          @php
                              $kegiatan = $kegiatans->first();
                          @endphp
                            @if($pendaftar->status_applicant === 'Shortlist')
                              <p class="shortlisted-info">This applicant is currently <b>shortlisted.</b> You have <b>{{ $kegiatan->sisa_hari }} days remaining</b> before the activity closes.</p>
                            @else
                              <p class="shortlisted-info">This applicant is not in Shortlist</p>
                            @endif 
                      </div>                       
                      <div class="informasi_pendaftaran-next-step">
                        <div class="button_next-step-all">
                          <div class="button_next-step">
                            <form id="interviewForm" action="{{ route('applicant.interview', ['id_pendaftar' => $pendaftar->id_pendaftar]) }}" method="POST">
                              @csrf
                              <button type="button" class="next-step-button" id="interviewAction" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="interview"
                                style="{{ in_array($pendaftar->status_applicant, ['Interview', 'Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                                @if (in_array($pendaftar->status_applicant, ['Interview', 'Hire', 'Reject'])) disabled @endif>
                                {{ in_array($pendaftar->status_applicant, ['Interview', 'Hire', 'Reject']) ? 'Interviewed' : 'Interview' }}
                              </button>
                            </form>
                            <button class="hire-button" id="openModalHireShortlist" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                              style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                              @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                              {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Hired' : 'Hire' }}
                            </button>
                          </div>
                          <button class="declined-button" id="openModalRejectShortlist" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                            style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                            @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                            {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Rejected' : 'Reject' }}
                          </button>
                        </div>
                      </div>
                    </div>

                    <div id="interview" class="content-section-hiring show">
                      <p class="stage-info-hiring">Stage Info</p>
                      <div class="interview-info">
                        <div class="interview-information">
                          <div class="interview-information__date">
                            <p class="interview-information-title">Interview Date</p>
                            @if ($pendaftar->tgl_interview)
                              <p class="interview-information-isi" id="interview-date">{{ $formattedInterviewDate }}</p>
                            @else
                              <p id="interview-date">Set schedule first</p>
                            @endif
                          </div>
                          <div class="interview-information__date">
                            <p class="interview-information-title">Interview Status</p>
                            <div class="interview-information-isi-status">
                              @if ($pendaftar->status_applicant === 'Hire' || $pendaftar->status_applicant === 'Reject')
                                @if ($pendaftar->tgl_interview)
                                  @if ($pendaftar->status_interview === 'Interview Completed')
                                    <p id="status_interview" class="status-completed">{{ ucfirst($pendaftar->status_interview) }}</p>
                                  @else
                                    <p id="status_interview" class="status-completed">Interview Completed</p>
                                  @endif
                                @else
                                  <p id="status_interview" class="status-not-scheduled">Not scheduled yet</p>
                                @endif
                              @else
                                @if ($pendaftar->tgl_interview)
                                  <p id="status_interview" class="
                                    @if ($pendaftar->status_interview === 'Not scheduled yet')
                                      status-not-scheduled
                                    @elseif ($pendaftar->status_interview === 'On progress')
                                      status-on-progress
                                    @elseif ($pendaftar->status_interview === 'Interview Completed')
                                      status-completed
                                    @endif
                                  ">
                                    {{ ucfirst($pendaftar->status_interview) }}
                                  </p>
                                @else
                                  <p class="status-not-scheduled">Not scheduled yet</p>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="interview-information__location">
                          <p class="interview-information-title">Interview Location</p>
                          @if ($pendaftar->tgl_interview)
                            <p class="interview-information-isi" id="interview-location">{{ $pendaftar->lokasi_interview }}</p>
                          @else
                            <p id="interview-location">Set schedule first</p>
                          @endif
                        </div>
                      </div>
                      <div class="informasi_pendaftaran-next-step">
                        <div class="button_next-step-all">
                          <div class="button_next-step">
                            <button class="hire-button" id="openModalHireNoteInterview" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                              style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                              @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                              {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Hired' : 'Hire' }}
                            </button>
                          </div>
                          <button class="declined-button" id="openModalRejectInterview" data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="hiredOrReject"
                            style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
                            @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
                            {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Rejected' : 'Reject' }}
                          </button>
                        </div>
                      </div>
                      <hr>
                      <div class="note-inter">
                        <div class="note-interview">
                          <p>Note</p>
                          <div class="add-button-note">
                            @if ($pendaftar->tgl_interview && $pendaftar->note_interview)
                              <i class="fa-solid fa-pen"></i>
                              <button class="add-note-button" id="openModalAddNote">
                                Update Note
                              </button>
                            @else 
                              <i class="fa-solid fa-plus"></i>
                              <button class="add-note-button" id="openModalAddNote">
                                Add Note
                              </button>
                            @endif
                          </div>
                        </div>
                        <div class="note-interview-container">
                          <div class="note-interview-wrap">
                            <div class="note-interview-title">
                              <i class="fa-solid fa-book"></i>
                              <p> INTERVIEW NOTE</p>
                            </div>
                            <p class="note-interview-date">{{$formattedNoteDate}}</p>
                          </div>
                          @if ($pendaftar->tgl_interview && $pendaftar->note_interview)
                            <div class="note-interview-isi">
                              {{-- <p>{{$pendaftar->interview->note_interview}}</p> --}}
                              <p class="short-note">{{ Str::limit($pendaftar->note_interview, 150, '...') }}</p>
                              <p class="more-note" style="display: none;">{{ $pendaftar->note_interview }}</p>
                              <a href="javascript:void(0);" onclick="toggleNote(this)" class="read-more-note">More</a>
                            </div>
                          </div>
                          @else
                              <p>No note</p>
                          @endif
                        </div>
                    </div>

                    <div id="hiredOrReject" class="content-section-hiring show">
                      <p class="stage-info-hiring">Stage Info</p>
                      <div class="informasi_pendaftaran-next-step">
                        <div class="note-interview-container">
                          <div class="note-interview-wrap">
                            <div class="note-interview-title">
                              <i class="fa-solid fa-book"></i>
                              <p> MESSAGE TO APPLICANT</p>
                            </div>
                            <p class="note-interview-date">{{$formattedNoteDate}}</p>
                          </div>
                          @if ($pendaftar->tgl_interview && $pendaftar->note_to_applicant)
                              <div class="note-interview-isi">
                                  <p class="short-note">{{ Str::limit($pendaftar->note_to_applicant, 150, '...') }}</p>
                                  <p class="more-note" style="display: none;">{{ $pendaftar->note_to_applicant }}</p>
                                  @if (Str::length($pendaftar->note_to_applicant) > 100)
                                      <a href="javascript:void(0);" onclick="toggleNote(this)" class="read-more-note">More</a>
                                  @endif
                              </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  
                  </div>
                </div>

                    {{-- MODAL ADD NOTE --}}
                    <div id="modalAddNote" class="modal__interview">
                      <div class="modal__schedule">
                        @if (!isset($pendaftar->tgl_interview))
                            <p class="text-warning">Please set the schedule first before adding or updating a note.</p>
                        @else
                          <div class="modal__headerSchedule">
                              <span id="closeModalAddNote" class="close">&times;</span>
                              <h3>New Note</h3>
                          </div>
                          <div class="modal__formSchedule">
                            <form action="{{ route('mitra.add-note-action', ['id_pendaftar' => $pendaftar->id_pendaftar]) }}"
                              method="POST" class="schedule-interview-form">
                              @csrf
                            
                                <div class="interview-location-form">
                                  <label>Note</label>
                                  <input type="date" name="tgl_note" value="{{ isset($pendaftar->tgl_interview) ? $pendaftar->tgl_note : '' }}" ></input>
                                  <textarea rows="3" name="note_interview">{{ old('note_interview', isset($pendaftar->tgl_interview) ? $pendaftar->note_interview : '') }}</textarea>
                                </div>
                                <button type="submit" class="main-btn-kategori primary-btn rounded btn-hover right-align">
                                  {{ isset($pendaftar->tgl_interview) && $pendaftar->note_interview ? 'Update Note' : 'Add New Note' }}
                                </button>
                            </form>
                          </div>
                        @endif
                        </div>
                    </div>

                    {{-- MODAL HIRE NOTE --}}
                    <div id="modalHireNote" class="modal__interview">
                      <div class="modal__schedule">
                        <div class="modal__headerSchedule">
                          <span id="closeHireNote" class="close">&times;</span>
                          <h3>New Note</h3>
                        </div>
                        <div class="modal__formSchedule">
                          <form id="hireForm" action="{{ route('applicant.hire', ['id_pendaftar' => $pendaftar->id_pendaftar]) }}" method="POST">
                            @csrf
                            <div class="interview-location-form">
                              <label>Send Note to Applicant</label>
                              <textarea rows="3" name="note_to_applicant"></textarea>
                            </div>
                            <button type="submit" id="hireAction" class="main-btn-kategori primary-btn rounded btn-hover right-align">
                              Send Note
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>

                  {{-- MODAL REJECT NOTE --}}
                    <div id="modalRejectNote" class="modal__interview">
                      <div class="modal__schedule">
                          <div class="modal__headerSchedule">
                              <span id="closeRejectNote" class="close">&times;</span>
                              <h3>New Note</h3>
                          </div>
                          <div class="modal__formSchedule">
                            <form id="rejectForm" action="{{ route('applicant.reject', ['id_pendaftar' => $pendaftar->id_pendaftar,])}}" method="POST">
                              @csrf
                                <div class="interview-location-form">
                                  <label>Send Note to Applicant</label>
                                  <textarea rows="3" name="note_to_applicant"></textarea>
                                </div>
                                <button type="submit" id="rejectAction" class="main-btn-kategori primary-btn rounded btn-hover right-align">
                                  Send Note
                                </button>
                            </form>
                          </div>
                        </div>
                    </div>
                    

              </div>
            </div>

          </div>

          
      </section>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- ========== section end ========== -->
      
      @include('mitra.layout.templates.footer')