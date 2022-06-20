{{$datakp-getPegawai->id}};

<div class="modal-body">
    <input type="hidden" name="data_pegawai_id" value="{{ $datakp->getPegawai->id }}">
    <div class="form-group">
        <label for="nama">Nama Pegawai</label>
        <input type="text" class="form-control" id="nama" name="namapegawai" value="{{ old('namapegawai') ?? $datakp->getPegawai->namapegawai }}" disabled>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') ?? $datakp->getPegawai->nip }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC SK Pengangkatan dalam Jabatan Struktural </label>
        <input type="file" name="skp_struktural" class="form-control" id="recipient-name" value="{{ old('skp_struktural') ?? $datakp->skp_struktural }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Surat Pernyataan Melaksanakan Tugas </label>
        <input type="file" name="sp_tugas" class="form-control" id="recipient-name" value="{{ old('sp_tugas') ?? $datakp->sp_tugas }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Surat Pernyataan Pelantikan </label>
        <input type="file" name ="sp_pelantikan" class="form-control" id="recipient-name" value="{{ old('sp_pelantikan') ?? $datakp->sp_pelantikan }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Berita Acara Pengangkatan Sumpah </label>
        <input type="file" name="ba_pengangkatansumpah" class="form-control" id="recipient-name" value="{{ old('ba_pengangkatansumpah') ?? $datakp->ba_pengangkatansumpah }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Ijazah Terakhir Legalisir </label>
        <input type="file" name="ijazah_terakhir"" class="form-control" id="recipient-name" value="{{ old('ijazah_terakhir') ?? $datakp->ijazah_terakhir }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Surat Tanda Lulus Diklatpim Tingkat III atau STLUD Tingkat II atau memiliki ijazah S-2 </label>
        <input type="file" name="surat_tandalulus" class="form-control" id="recipient-name" value="{{ old('surat_tandalulus') ?? $datakp->surat_tandalulus }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC SKP Tahun 2020 </label>
        <input type="file" name="skp_2020" class="form-control" id="recipient-name" value="{{ old('skp_2020') ?? $datakp->skp_2020 }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC SKP Tahun 2021 </label>
        <input type="file" name="skp_2021" class="form-control" id="recipient-name" value="{{ old('skp_2021') ?? $datakp->skp_2021 }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC SKP Jabatan </label>
        <input type="file" name="skp_jabatan" class="form-control" id="recipient-name" value="{{ old('skp_jabatan') ?? $datakp->skp_jabatan }}" disabled>
    </div>
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">FC Surat Pernyataan Pengangkatan yang lama </label>
        <input type="file" name="sp_pengangkatanlama" class="form-control" id="recipient-name" value="{{ old('sp_pengangkatanlama') ?? $datakp->sp_pengangkatanlama }}" disabled>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
</div>