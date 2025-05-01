@extends('main')
@section('content')
<div class="dashboard-admin">
    <div class="container-fluid g-0">
      <div class="row">
        <div class="col-s-9">
          <div class="content">
            <div class="content-title">
              <h2>Hallo Admin {{ auth()->user()->name }}</h2>
            </div>
            <div class="content-task">
              <div class="row">
                <div class="col-xl-3">
                  <div class="item">
                    <div class="icon"><svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="url(#paint0_linear_23_1534)" />
                        <g clip-path="url(#clip0_23_1534)">
                          <path
                            d="M39.6673 20.0434L26.3557 33.3667L21.409 28.42L23.054 26.775L26.3557 30.0767L38.0223 18.41L39.6673 20.0434ZM28.0007 37.3334C22.8557 37.3334 18.6673 33.145 18.6673 28C18.6673 22.855 22.8557 18.6667 28.0007 18.6667C29.8323 18.6667 31.5473 19.2034 32.994 20.125L34.6856 18.4334C32.784 17.115 30.4857 16.3334 28.0007 16.3334C21.5607 16.3334 16.334 21.56 16.334 28C16.334 34.44 21.5607 39.6667 28.0007 39.6667C30.019 39.6667 31.9207 39.1534 33.5773 38.2434L31.8273 36.4934C30.6607 37.03 29.3657 37.3334 28.0007 37.3334ZM36.1673 31.5H32.6673V33.8334H36.1673V37.3334H38.5007V33.8334H42.0007V31.5H38.5007V28H36.1673V31.5Z"
                            fill="white" />
                        </g>
                        <defs>
                          <linearGradient id="paint0_linear_23_1534" x1="0" y1="28" x2="56" y2="28"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4481EB" />
                            <stop offset="1" stop-color="#04BEFE" />
                          </linearGradient>
                          <clipPath id="clip0_23_1534">
                            <rect width="28" height="28" fill="white" transform="translate(14 14)" />
                          </clipPath>
                        </defs>
                      </svg>
                    </div>
                    <div class="desc">
                      <h5>Tugas Baru</h5>
                      <p>{{$belum_dikonfirmasi}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="item">
                    <div class="icon"><svg width="57" height="56" viewBox="0 0 57 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28.1992" cy="28" r="28" fill="#F4F7FE" />
                        <g clip-path="url(#clip0_23_1500)">
                          <path
                            d="M20.4841 24.3136H20.7578C21.8115 24.3136 22.6736 25.1757 22.6736 26.2293V35.8082C22.6736 36.8618 21.8115 37.7239 20.7578 37.7239H20.4841C19.4305 37.7239 18.5684 36.8618 18.5684 35.8082V26.2293C18.5684 25.1757 19.4305 24.3136 20.4841 24.3136ZM28.1472 18.5663C29.2008 18.5663 30.0629 19.4284 30.0629 20.482V35.8082C30.0629 36.8618 29.2008 37.7239 28.1472 37.7239C27.0935 37.7239 26.2314 36.8618 26.2314 35.8082V20.482C26.2314 19.4284 27.0935 18.5663 28.1472 18.5663ZM35.8102 29.5135C36.8639 29.5135 37.726 30.3756 37.726 31.4293V35.8082C37.726 36.8618 36.8639 37.7239 35.8102 37.7239C34.7566 37.7239 33.8945 36.8618 33.8945 35.8082V31.4293C33.8945 30.3756 34.7566 29.5135 35.8102 29.5135Z"
                            fill="#4318FF" />
                        </g>
                        <defs>
                          <clipPath id="clip0_23_1500">
                            <rect width="32.8417" height="32.8417" fill="white"
                              transform="translate(11.7266 11.7242)" />
                          </clipPath>
                        </defs>
                      </svg>

                    </div>
                    <div class="desc">
                      <h5>Total Pesanan</h5>
                      <p>{{$total}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="item">
                    <div class="icon"><svg width="57" height="56" viewBox="0 0 57 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28.4004" cy="28" r="28" fill="#F4F7FE" />
                        <g clip-path="url(#clip0_23_1543)">
                          <path
                            d="M31.6497 16.0833H19.7331C18.5414 16.0833 17.5664 17.0583 17.5664 18.2499V32.3333C17.5664 32.9291 18.0539 33.4166 18.6497 33.4166C19.2456 33.4166 19.7331 32.9291 19.7331 32.3333V19.3333C19.7331 18.7374 20.2206 18.2499 20.8164 18.2499H31.6497C32.2456 18.2499 32.7331 17.7624 32.7331 17.1666C32.7331 16.5708 32.2456 16.0833 31.6497 16.0833ZM32.2889 21.0558L37.5214 26.2883C37.9222 26.6891 38.1497 27.2416 38.1497 27.8158V37.7499C38.1497 38.9416 37.1747 39.9166 35.9831 39.9166H24.0556C22.8639 39.9166 21.8997 38.9416 21.8997 37.7499L21.9106 22.5833C21.9106 21.3916 22.8747 20.4166 24.0664 20.4166H30.7506C31.3247 20.4166 31.8772 20.6441 32.2889 21.0558ZM31.6497 27.9999H36.5247L30.5664 22.0416V26.9166C30.5664 27.5124 31.0539 27.9999 31.6497 27.9999Z"
                            fill="#4318FF" />
                        </g>
                        <defs>
                          <clipPath id="clip0_23_1543">
                            <rect width="26" height="26" fill="white" transform="translate(15.4004 15)" />
                          </clipPath>
                        </defs>
                      </svg>

                    </div>
                    <div class="desc">
                      <h5>Total Task Selesai</h5>
                      <p>{{$diterima}}</p>
                    </div>
                  </div>
                </div>
                <!--<div class="col-xl-3">-->
                <!--  <div class="item">-->
                <!--    <div class="icon"><svg width="57" height="56" viewBox="0 0 57 56" fill="none"-->
                <!--        xmlns="http://www.w3.org/2000/svg">-->
                <!--        <circle cx="28.5996" cy="28" r="28" fill="#F4F7FE" />-->
                <!--        <g clip-path="url(#clip0_23_1509)">-->
                <!--          <path-->
                <!--            d="M28.2721 26.6398C25.1658 25.8325 24.1669 24.9978 24.1669 23.6978C24.1669 22.2062 25.5489 21.1662 27.8615 21.1662C29.8047 21.1662 30.7762 21.9052 31.132 23.082C31.2962 23.6294 31.7478 24.0399 32.3225 24.0399H32.7331C33.6362 24.0399 34.2794 23.1504 33.9646 22.302C33.3899 20.6873 32.0489 19.3463 29.9141 18.8263V17.8821C29.9141 16.7463 28.9973 15.8295 27.8615 15.8295C26.7258 15.8295 25.8089 16.7463 25.8089 17.8821V18.7852C23.1542 19.3599 21.0195 21.0841 21.0195 23.7252C21.0195 26.8862 23.6332 28.4598 27.451 29.3767C30.872 30.1977 31.5562 31.4019 31.5562 32.6745C31.5562 33.6187 30.8857 35.1239 27.8615 35.1239C25.6037 35.1239 24.4405 34.3166 23.989 33.1671C23.7837 32.6335 23.3184 32.2503 22.7574 32.2503H22.3742C21.4574 32.2503 20.8143 33.1808 21.1564 34.0292C21.9364 35.9313 23.7563 37.0534 25.8089 37.4913V38.4081C25.8089 39.5439 26.7258 40.4607 27.8615 40.4607C28.9973 40.4607 29.9141 39.5439 29.9141 38.4081V37.5187C32.5825 37.0123 34.7036 35.466 34.7036 32.6608C34.7036 28.7746 31.3783 27.4472 28.2721 26.6398Z"-->
                <!--            fill="#4318FF" />-->
                <!--        </g>-->
                <!--        <defs>-->
                <!--          <clipPath id="clip0_23_1509">-->
                <!--            <rect width="32.8417" height="32.8417" fill="white" transform="translate(12.125 11.7242)" />-->
                <!--          </clipPath>-->
                <!--        </defs>-->
                <!--      </svg>-->

                <!--    </div>-->
                <!--    <div class="desc">-->
                <!--      <h5>Pemasukan</h5>-->
                <!--      <p>Rp 4.800.000</p>-->
                <!--    </div>-->
                <!--  </div>-->

                <!--</div>-->
              </div>

            </div>
            <div class="content-chart">
              <div class="row">
                <div class="col-xl-8">
                  <div class="wrapper">
                    <div class="action">
                      <h5>Laporan Service</h5>
                      <!--<div class="filter">-->
                      <!--  <div class="date">-->
                      <!--    <p>12 Bulan</p>-->
                      <!--  </div>-->
                      <!--  <div class="date">-->
                      <!--    <p>6 Bulan</p>-->
                      <!--  </div>-->
                      <!--  <div class="date">-->
                      <!--    <p>30 Hari</p>-->
                      <!--  </div>-->
                      <!--  <div class="date">-->
                      <!--    <p>7 Hari</p>-->
                      <!--  </div>-->
                      <!--</div>-->
                      {{-- <div class="export">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M11.3705 8.57983V13.4053M11.3705 13.4053L8.71644 10.9926M11.3705 13.4053L14.0245 10.9926M15.7938 17.4266H6.94709C5.9699 17.4266 5.17773 16.7064 5.17773 15.8181V4.55858C5.17773 3.67022 5.9699 2.95007 6.94709 2.95007H11.8887C12.1233 2.95007 12.3484 3.03481 12.5143 3.18563L17.3041 7.54002C17.47 7.69085 17.5632 7.89541 17.5632 8.10871V15.8181C17.5632 16.7064 16.771 17.4266 15.7938 17.4266Z"
                            stroke="#18181B" stroke-width="1.99052" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Export PDF</span>
                      </div> --}}
                    </div>
                    <div id="chart">
                    </div>
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="content-customer">
                    <div class="actions">
                      <h5 class="font-jakarta">Pelanggan Terbaru</h5>
                    </div>
                    <div class="profile">
                      @if (isset($reservasi) AND $total>0)
                      @foreach ($reservasi as $item)
                      <div class="item">
                        <div class="position">
                          <div class="text">
                            <h5>{{$item->name}}</h5>
                            <p class="font-jakarta">{{$item->alamat}}</p>
                          </div>
                        </div>
                        <div class="price">
                          <p class="font-jakarta">{{$item->created_at}}</p>
                        </div>
                      </div>
                      @endforeach
                      @else
                      <div class="item">
                        <div class="position">
                          <div class="text">
                            <h5>Tidak Ada Pelanggan Baru</h5>
                            <p class="font-jakarta">-</p>
                          </div>
                        </div>
                        <div class="price">
                          <p class="font-jakarta">-</p>
                        </div>
                      </div>
                      @endif
                      {{-- <div class="item">
                        <div class="position">
                          <div class="text">
                            <h5>Jenny Wilson</h5>
                            <p class="font-jakarta">Good Service</p>
                          </div>
                        </div>
                        <div class="price">
                          <p class="font-jakarta">$11,159</p>
                        </div>
                      </div>
                      <div class="item">
                        <div class="position">
                          <div class="text">
                            <h5>Devon Lane</h5>
                            <p class="font-jakarta">Pelayanan ramah dan bintang 5 deh u...</p>
                          </div>
                        </div>
                        <div class="price">
                          <p class="font-jakarta">$11,159</p>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content-order">
              <div class="action">
                <h5 class="font-jakarta">Tasks / Pesanan Baru</h5>
                <p class="font-jakarta"><a href="/reservasi">Lihat Semua
                  </a><svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.09961 2.03342L6.66628 4.60008L4.09961 7.16675" stroke="#4F46E5" stroke-width="1.2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg></p>
              </div>
              {{-- Mulai for loop --}}
              {{-- @dd($reservasi) --}}
              @if (isset($reservasi) AND $total>0)
              @foreach ($reservasi as $item)
              <div class="service">
                <div class="row">
                  <div class="col-xl-12">
                    <div class="time">
                      <p>{{$item->created_at}}</p>
                      <h5>{{$item->nama_layanan}}</h5>
                    </div>
                  </div>
                </div>

                <div class="desc">
                  <div class="type">
                    <p>Tipe handphone</p>
                    <h5>{{$item->merk_hp}}</h5>
                  </div>
                  <div class="status">
                  <p>Status Layanan</p>
                  @if ($item->status == "Belum Dikonfirmasi")
                    <h5>{{$item->status}}</h5>
                  </div>
                  <button data-item="{{json_encode($item)}}" id="konfirmasi" type="button" class="btn confirm" data-bs-toggle="modal" data-bs-target="#modalkonfirmasi-{{$item->id_reservasi}}">Beri Konfirmasi</button>

                  <div class="modal fade" id="modalkonfirmasi-{{$item->id_reservasi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservasi Layanan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid info">
                                    <div class="row">
                                        <div class="col">
                                            <h5>Nama Pelanggan</h5>
                                            <p id="Nama Pelanggan">{{$item->name}}</p>
                                        </div>
                                        <div class="col">
                                            <h5>Waktu Permohonan</h5>
                                            <p id="created_at">{{$item->created_at}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5>Nama Layanan</h5>
                                            {{$item->nama_layanan}}
                                        </div>
                                        <div class="col">
                                            <h5>Tipe Handphone</h5>
                                            {{$item->merk_hp}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5>Keterangan</h5>
                                        <p>{{$item->keterangan}}</p>
                                    </div>
                                    {{-- <div class="row">
                                        <h5>Keterangan Penolakan</h5>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Tulis keterangan untuk pelanggan jika permohonan ditolak" id="floatingTextarea2" style="height: 100px"></textarea>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url("/reservasi/$item->id_reservasi/Ditolak") }}">
                                <button type="button" class="btn btn-danger">Tolak</button>
                                </a>
                                <a href="{{ url("/reservasi/$item->id_reservasi/Diterima") }}">
                                <button type="button" class="btn btn-primary">Terima</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
                @endif
                @if ($item->status == "Diterima" or $item->status == "Ditolak")
                <h5 class="">{{$item->status}}</h5>
              </div>
              <div class="button-detail">
                  <a class="confirm-detail" type="button" data-item="{{json_encode($item)}}" data-bs-toggle="modal" data-bs-target="#modalDetail-{{$item->id_reservasi}}"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7.66812 1.46655C7.80541 1.46655 7.91102 1.57855 7.91102 1.71189V3.42922C7.91102 4.40522 8.70838 5.20522 9.67472 5.21055C10.076 5.21055 10.3929 5.21589 10.6358 5.21589L10.7257 5.21549C10.8881 5.21426 11.1066 5.21055 11.2958 5.21055C11.4279 5.21055 11.5335 5.31722 11.5335 5.45055V9.73855C11.5335 11.0612 10.4721 12.1332 9.16251 12.1332H4.95921C3.58627 12.1332 2.4668 11.0079 2.4668 9.62122V3.87189C2.4668 2.54922 3.53346 1.46655 4.84832 1.46655H7.66812ZM8.23313 8.34655H5.36053C5.14402 8.34655 4.96449 8.52255 4.96449 8.74122C4.96449 8.95989 5.14402 9.14122 5.36053 9.14122H8.23313C8.44964 9.14122 8.62917 8.95989 8.62917 8.74122C8.62917 8.52255 8.44964 8.34655 8.23313 8.34655ZM7.14534 5.67989H5.36053C5.14402 5.67989 4.96449 5.86122 4.96449 6.07989C4.96449 6.29855 5.14402 6.47455 5.36053 6.47455H7.14534C7.36185 6.47455 7.54138 6.29855 7.54138 6.07989C7.54138 5.86122 7.36185 5.67989 7.14534 5.67989ZM8.6805 1.94975C8.6805 1.71989 8.95667 1.60575 9.11456 1.77162C9.68538 2.37109 10.6829 3.41909 11.2405 4.00469C11.3947 4.16629 11.2817 4.43455 11.0594 4.43509C10.6253 4.43669 10.1136 4.43509 9.74558 4.43135C9.16156 4.43135 8.6805 3.94549 8.6805 3.35562V1.94975Z"
                          fill="#4F46E5" />
                      </svg>
                      Lihat Detail
                  </a>
                  <a class="menu-detail" type="button" data-item="{{json_encode($item)}}" data-bs-toggle="modal" data-bs-target="#modalEdit-{{$item->id_reservasi}}">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M6.59734 4.18173C7.07933 4.18173 7.47006 3.791 7.47006 3.30901C7.47006 2.82701 7.07933 2.43628 6.59734 2.43628C6.11534 2.43628 5.72461 2.82701 5.72461 3.30901C5.72461 3.791 6.11534 4.18173 6.59734 4.18173Z"
                          fill="#4F46E5" />
                      <path
                          d="M6.59734 7.6727C7.07933 7.6727 7.47006 7.28197 7.47006 6.79997C7.47006 6.31798 7.07933 5.92725 6.59734 5.92725C6.11534 5.92725 5.72461 6.31798 5.72461 6.79997C5.72461 7.28197 6.11534 7.6727 6.59734 7.6727Z"
                          fill="#4F46E5" />
                      <path
                          d="M6.59734 11.1635C7.07933 11.1635 7.47006 10.7728 7.47006 10.2908C7.47006 9.80882 7.07933 9.41809 6.59734 9.41809C6.11534 9.41809 5.72461 9.80882 5.72461 10.2908C5.72461 10.7728 6.11534 11.1635 6.59734 11.1635Z"
                          fill="#4F46E5" />
                      </svg>
                  </a>
              </div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail-{{$item->id_reservasi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel">Reservasi Layanan</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <div class="container-fluid info">
      <div class="row">
          <div class="col">
              <h5>Nama Pelanggan</h5>
              {{$item->name}}
          </div>
          <div class="col">
              <h5>Waktu Permohonan</h5>
              {{$item->created_at}}
          </div>
      </div>
      <div class="row">
          <div class="col">
              <h5>Nama Layanan</h5>
              {{$item->nama_layanan}}
          </div>
          <div class="col">
              <h5>Tipe Handphone</h5>
              {{$item->merk_hp}}
          </div>
      </div>
      <div class="row">
          <h5>Keterangan</h5>
          <p>{{$item->keterangan}}</p>
      </div>
      <div class="row">
          <h5>Status Permohonan</h5>
          <p>{{$item->status}}</p>
      </div>
      {{-- <div class="row">
          <h5>Keterangan Penolakan</h5>
          <p>Kasian ditolak HAHAHAHA makanya nge gym</p>
      </div> --}}
  </div>
</div>
</div>
</div>
</div>
<!-- End -->
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit-{{$item->id_reservasi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel">Reservasi Layanan</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <div class="container-fluid info">
      <div class="row">
          <div class="col">
              <h5>Nama Pelanggan</h5>
              {{$item->name}}
          </div>
          <div class="col">
              <h5>Waktu Permohonan</h5>
              {{$item->created_at}}
          </div>
      </div>
      <div class="row">
          <div class="col">
              <h5>Nama Layanan</h5>
              {{$item->nama_layanan}}
          </div>
          <div class="col">
              <h5>Tipe Handphone</h5>
              {{$item->merk_hp}}
          </div>
      </div>
      <div class="row">
          <h5>Keterangan</h5>
          <p>{{$item->keterangan}}</p>
      </div>
      <div class="row">
          <h5 class="mb-3">Status Permohonan</h5>
          <div class="col">
              {{-- <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off" >
              <label class="btn" for="option5">Diterima</label>

              <input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off">
              <label class="btn" for="option6">Ditolak</label> --}}

              <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <a href="{{ url("/reservasi/$item->id_reservasi/Diterima") }}">
                  <button type="button" class="btn btn-outline-success btn-sm">Diterima</button>
                  </a>
                  <a href="{{ url("/reservasi/$item->id_reservasi/Ditolak") }}">
                  <button type="button" class="btn btn-outline-danger btn-sm">Ditolak</button>
                  </a>
              </div>
          </div>
      </div>
      {{-- <div class="row">
          <h5>Keterangan Penolakan</h5>
          <p>Kasian ditolak HAHAHAHA makanya nge gym</p>
      </div> --}}
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
  <button type="button" class="btn btn-primary">Simpan</button>
</div>
</div>
</div>
</div>
<!-- End -->
                  @endif

                </div>

              </div>
              @endforeach
              @else
              {{-- Selesai loop --}}
              <div class="service">
                <div class="time">
                  <p>16.30 WIB</p>
                  <h5>Layanan Service Layar Handphone Android</h5>
                </div>
                <div class="desc">
                  <div class="type">
                    <p>Tipe handphone</p>
                    <h5>Sony Experia E34</h5>
                  </div>
                  <div class="status">
                    <p>Status Layanan</p>
                    <h5>Belum Dikonfirmasi</h5>
                  </div>
                  <button type="button" class="btn confirm" data-bs-toggle="modal" data-bs-target="#exampleModal">Beri Konfirmasi</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Reservasi Layanan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-4">.col-md-4</div>
                                <div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div>
                              </div>
                              <div class="row">
                                <div class="col-md-3 ms-auto">.col-md-3 .ms-auto</div>
                                <div class="col-md-2 ms-auto">.col-md-2 .ms-auto</div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 ms-auto">.col-md-6 .ms-auto</div>
                              </div>
                              <div class="row">
                                <div class="col-sm-9">
                                  Level 1: .col-sm-9
                                  <div class="row">
                                    <div class="col-8 col-sm-6">
                                      Level 2: .col-8 .col-sm-6
                                    </div>
                                    <div class="col-4 col-sm-6">
                                      Level 2: .col-4 .col-sm-6
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger">Tolak</button>
                          <button type="button" class="btn btn-primary">Terima</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              @endif
              {{-- Selesai IF --}}
              {{-- <div class="service">
                <div class="time">
                  <p>16.30 WIB</p>
                  <h5>Layanan Service Layar Handphone Android</h5>
                </div>
                <div class="desc">
                  <div class="type">
                    <p>Tipe handphone</p>
                    <h5>Sony Experia E34</h5>
                  </div>
                  <div class="status ">
                    <p>Status Layanan</p>
                    <h5 class="status-confirm">Sudah Dikonfirmasi</h5>
                  </div>
                  <div class="button-detail">
                    <a href="" class="confirm-detail"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M7.66812 1.46655C7.80541 1.46655 7.91102 1.57855 7.91102 1.71189V3.42922C7.91102 4.40522 8.70838 5.20522 9.67472 5.21055C10.076 5.21055 10.3929 5.21589 10.6358 5.21589L10.7257 5.21549C10.8881 5.21426 11.1066 5.21055 11.2958 5.21055C11.4279 5.21055 11.5335 5.31722 11.5335 5.45055V9.73855C11.5335 11.0612 10.4721 12.1332 9.16251 12.1332H4.95921C3.58627 12.1332 2.4668 11.0079 2.4668 9.62122V3.87189C2.4668 2.54922 3.53346 1.46655 4.84832 1.46655H7.66812ZM8.23313 8.34655H5.36053C5.14402 8.34655 4.96449 8.52255 4.96449 8.74122C4.96449 8.95989 5.14402 9.14122 5.36053 9.14122H8.23313C8.44964 9.14122 8.62917 8.95989 8.62917 8.74122C8.62917 8.52255 8.44964 8.34655 8.23313 8.34655ZM7.14534 5.67989H5.36053C5.14402 5.67989 4.96449 5.86122 4.96449 6.07989C4.96449 6.29855 5.14402 6.47455 5.36053 6.47455H7.14534C7.36185 6.47455 7.54138 6.29855 7.54138 6.07989C7.54138 5.86122 7.36185 5.67989 7.14534 5.67989ZM8.6805 1.94975C8.6805 1.71989 8.95667 1.60575 9.11456 1.77162C9.68538 2.37109 10.6829 3.41909 11.2405 4.00469C11.3947 4.16629 11.2817 4.43455 11.0594 4.43509C10.6253 4.43669 10.1136 4.43509 9.74558 4.43135C9.16156 4.43135 8.6805 3.94549 8.6805 3.35562V1.94975Z"
                          fill="#4F46E5" />
                      </svg>
                      Lihat Detail</a>
                    <div class="menu-detail">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.59734 4.18173C7.07933 4.18173 7.47006 3.791 7.47006 3.30901C7.47006 2.82701 7.07933 2.43628 6.59734 2.43628C6.11534 2.43628 5.72461 2.82701 5.72461 3.30901C5.72461 3.791 6.11534 4.18173 6.59734 4.18173Z"
                          fill="#4F46E5" />
                        <path
                          d="M6.59734 7.6727C7.07933 7.6727 7.47006 7.28197 7.47006 6.79997C7.47006 6.31798 7.07933 5.92725 6.59734 5.92725C6.11534 5.92725 5.72461 6.31798 5.72461 6.79997C5.72461 7.28197 6.11534 7.6727 6.59734 7.6727Z"
                          fill="#4F46E5" />
                        <path
                          d="M6.59734 11.1635C7.07933 11.1635 7.47006 10.7728 7.47006 10.2908C7.47006 9.80882 7.07933 9.41809 6.59734 9.41809C6.11534 9.41809 5.72461 9.80882 5.72461 10.2908C5.72461 10.7728 6.11534 11.1635 6.59734 11.1635Z"
                          fill="#4F46E5" />
                      </svg>

                    </div>
                  </div>
                </div>

              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


  <script type='text/javascript'>
    var total = JSON.parse('<?= json_encode($total_layanan); ?>');
    var nama_layanan = JSON.parse('<?= json_encode($nama_layanan); ?>');
    var options = {
      series: [
        {
          name: "Total Reservasi",
          data: total
        }
      ],
      chart: {
        height: 250,
        type: 'line',
        dropShadow: {
          enabled: true,
          color: '#000',
          top: 18,
          left: 7,
          blur: 10,
          opacity: 0.2
        },
        toolbar: {
          show: false
        }
      },

      stroke: {
        curve: 'smooth'
      },
      grid: {
        borderColor: '#e7e7e7',
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      markers: {
        size: 0
      },
      xaxis: {
        categories: nama_layanan,
      },
      yaxis: {
        show: false
      },
      legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>
@endsection

