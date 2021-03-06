<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Grafik Pertumbuhan Menurut Umur</title>
    <style>
        .berat-badan {
            background-image: linear-gradient(to left, #90d4fc, #38b6ff);
            z-index: 3;
        }

        .berat-badan .title-text {
            font-size: 20px;
        }

        .berat-badan i {
            font-size: 19px;
        }

        .daftar {
            min-height: 100%;
            padding: 50px 0 70px 0;
        }

        .daftar .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.178);
        }

        .card .childIcon {
            width: 60px;
            height: 60px;
            /* border: 3px solid black; */
        }

        .profile .card .card-title .card-text {
            font-size: 17px;
        }

        .backdrop.active {
            display: block;
        }

        .profile i {
            font-size: 20px;
        }

        .card-body:nth-child(even) {
            margin-left: 5%;
            margin-right: 30px;
            background-color: rgba(43, 255, 0, 0.26);
        }
    </style>
</head>

<body id="body">
    <!-- header -->
    <header class="berat-badan fixed-top border-0" id="berat-badan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex mx-auto border-0 my-auto py-2 headerTop">
                    <a href="{{ route('menu-grafik') }}" class="card-title text-white mb-0 py-1 my-auto">
                        <i class="fa fa-arrow-left mb-0"></i>
                    </a>
                    <p class="title-text text-white fw-bold my-auto py-1 col-11 text-center">Grafik Pertumbuhan</p>
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <!-- profile -->
    <section class="profile mt-5" id="profile">
        <div class="container">
            <div class="row">
                <div class="col-12 px-0">
                    <form action="">

                        <div class="card px-1 rounded-0 border-0" style="background-image: linear-gradient(to left, #90d4fc, #38b6ff);">
                            <div class="card-body">
                                <div class="card-title text-center text-white fw-bold">
                                    <p class="card-text">{{ $data->data_nama_lengkap }}</p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: rgba(255, 255, 255, 0.692)">Jenis Kelamin</p>
                                    <div class="icon text-white">
                                        @switch($data->data_jenis_kelamin)
                                            @case('L')
                                                <i class="fa fa-male my-auto"></i>
                                                @break
                                            @case('P')
                                                <i class="fa fa-female my-auto"></i>
                                                @break
                                        @endswitch
                                    </div>
                                </div>
                                <div class="card-title fw-bold text-white">
                                    <p class="card-text">
                                        @switch($data->data_jenis_kelamin)
                                            @case('L')
                                                Laki - Laki
                                                @break
                                            @case('P')
                                                Perempuan
                                                @break
                                        @endswitch
                                    </p>
                                </div>
                                <div class="card-title d-flex justify-content-between mb-0">
                                    <p class="card-text my-auto" style="font-size: 14px; color: rgba(255, 255, 255, 0.692)">Tanggal Lahir</p>
                                    <i class="fa fa-birthday-cake my-auto text-white"></i>
                                </div>
                                <div class="card-title fw-bold text-white">
                                    <p class="card-text">
                                        {{ date("d-m-Y", strtotime($data->data_tanggal_lahir)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- akhir dari card -->
                    </form>
                    <!-- card -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end of profile -->

    <!-- grafik -->

    <section class="grafik pb-5" id="grafik">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-3 py-3">
                            <div class="chartMenu">
                                <p class="mb-2 fw-bold">Berat Badan Menurut Umur</p>
                            </div>
                            <div class="message" style="display: none;">
                                <h5 class="text-center text-danger">Data Kosong, Lakukan Pengukuran terlebih dahulu di menu Hitung Gizi !!!!</h5>
                                <button class="btn col-12 rounded-pill text-white" style="background-color: #0099ff;">Hitung Gizi</button>
                            </div>
                            <div class="charLegend d-flex flex-column col-5 border border-1 px-2 py-2">
                                <div class="Gizi Baik d-inline-flex align-items-center">
                                    <div class="bg-success" style="width: 12px; height: 12px;"></div>
                                    <p class="mb-0 ms-1">Gizi Baik</p>
                                </div>
                                <div class="Gizi Lebih d-flex align-items-center">
                                    <div class="bg-warning " style="width: 12px; height: 12px;"></div>
                                    <p class="mb-0 ms-1">Gizi Lebih</p>
                                </div>
                                <div class="Gizi Kurang d-flex align-items-center">
                                    <div class="bg-danger " style="width: 12px; height: 12px;"></div>
                                    <p class="mb-0 ms-1">Gizi Kurang</p>
                                </div>
                            </div>
                            <div class="chartCard">
                                <div class="chartBox">
                                    <canvas id="myChart" style="height: 500px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- end of grafik  -->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- chartjs code for grafik -->
    <script>
        // setup
        const data = {
            labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50'],
            datasets: [{
                label: 'Z Score',
                data: [2, 1, -1, 1.7, -1.6, 3, 2.2, , , , , , , , 2, , , , , , -1.3],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 1,
                tension: 0.4
            }]
        };

        const doubleArbitraryLine = {
                id: 'doubleArbitraryLine',
                beforeDraw(chart, args, options) {
                    const {
                        ctx,
                        chartArea: {
                            top,
                            right,
                            bottom,
                            left,
                            width,
                            height
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    console.log(ctx);

                    // batas atas line
                    ctx.strokeStyle = 'orange',
                        ctx.strokeRect(left, y.getPixelForValue(2), width, 0);
                    ctx.restore();

                    // batas atas background
                    ctx.fillStyle = 'rgba(255, 166, 0, 0.296)';
                    ctx.fillRect(left, top, width, y.getPixelForValue(2) - top);
                    ctx.restore();

                    // batas atas text
                    ctx.font = '15px Arial';
                    ctx.fillStyle = 'Orange';
                    ctx.fillText('Batas Atas', width / 2 + left, y.getPixelForValue(2) - 9)
                    ctx.textAlign = 'center';
                    ctx.restore;

                    // batas bawah line
                    ctx.strokeStyle = 'red',
                        ctx.strokeRect(left, y.getPixelForValue(-3), width, 0);
                    ctx.restore();

                    ctx.fillStyle = 'rgba(43, 255, 0, 0.26)';
                    ctx.fillRect(left, right, width, y.getPixelForValue(-3) - right);
                    ctx.restore();

                    ctx.fillStyle = 'rgba(43, 255, 0, 0.26)';
                    ctx.fillRect(left, right, width, y.getPixelForValue(2) - right);
                    ctx.restore();
                    // batas bawah background
                    ctx.fillStyle = 'rgba(255, 69,0, 0.2)';
                    ctx.fillRect(left, bottom, width, y.getPixelForValue(-3) - bottom);
                    ctx.restore();

                    // batas bawah text
                    ctx.font = '15px Arial';
                    ctx.fillStyle = 'red';
                    ctx.fillText('Batas Bawah', width / 2 + left, y.getPixelForValue(-3) - (-9))
                    ctx.textAlign = 'center';
                    ctx.restore;
                }


            }
            // config
        const config = {
            type: 'line',
            data,
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Kriteria Gizi'
                        },

                        beginAtZero: true,
                        max: 4,
                        min: -4
                    },
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Umur berdasarkan Bulan'
                        },
                        ticks: {
                            maxTicksLimit: 12,
                        }
                    }
                }
            },
            plugins: [doubleArbitraryLine]
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    <!-- end of code -->
</body>

</html>
