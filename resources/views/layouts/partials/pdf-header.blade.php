<table style="width: 100%; margin-bottom: 1rem">
    <tr>
        <td><img height="60" src="{{ asset('img/educare.png') }}" alt=""></td>

        <td style="width: 300px">
            <h3>Training - Assesment – Therapy</h3>

            <p style="font-size: 1.1rem">
                Jalan Bau Mangga II No. 7 Makassar<br/>
                Telp. 085341171639 email: educare_mks@yahoo.com
            </p>
        </td>
    </tr>
</table>

<table class="table table-bordered table-condensed" style="background: aliceblue">
    <thead>
        <tr>
            <th colspan="6" style="text-align: center; font-weight: 800; padding: 0">
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
            <td colspan="6"></td>
        </tr>
    </tfoot>
</table>