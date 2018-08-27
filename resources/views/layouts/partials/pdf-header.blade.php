<table style="width: 100%; margin-bottom: 30px">
    <tr>
        <td><img height="100" src="{{ asset('img/educare.png') }}" alt=""></td>

        <td style="width: 40%">
            <h3 style="margin-bottom: 0; padding-bottom: 0">Training - Assesment – Therapy</h3>

            <p style="line-height: 1.5rem">
                Jalan Bau Mangga II No. 7 Makassar<br/>
                Telp. 085341171639<br/>
                email: educare_mks@yahoo.com
            </p>
        </td>
        <!-- boder biru dibawah -->
    </tr>
</table>

<div>
    <table class="table table-bordered" style="background: aliceblue">
        <thead>
            <tr>
                <th colspan="6" style="text-align: center; font-weight: 800">
                    <h3>HASIL PEMERIKSAAN PSIKOLOGIS PEMETAAN POTENSI DIRI</h3>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Nama</td>
                <td style="width: 10px; text-align: center">:</td>
                <td>{{ $model->test_taker_name }}</td>
                <td>Sekolah</td>
                <td style="width: 10px; text-align: center">:</td>
                <td>{{ $school->name }}</td>
            </tr>

            <tr>
                <td>No. Tes</td>
                <td style="width: 10px; text-align: center">:</td>
                <td>{{ $model->test_taker_number }}</td>
                <td>Tanggal Tes</td>
                <td style="width: 10px; text-align: center">:</td>
                <td></td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
        </tfoot>
    </table>
</div>