                                            <div class="modal-body">
                                                @if ($datapegawai->pegawaiKgb->isEmpty())
                                                    <div>
                                                        <h5>Data KGB Belum Tersedia</h5>
                                                    </div>
                                                @endif
                                                <input type="hidden" name="data_pegawai_id"
                                                    value="{{ $datapegawai->id }}">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pegawai</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        name="namapegawai"
                                                        value="{{ old('namapegawai') ?? $datapegawai->namapegawai }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" id="nip"
                                                        name="nip" value="{{ old('nip') ?? $datapegawai->nip }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal Lahir
                                                        :</label>
                                                    <input type="date" name="tgl_lahir" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('tgl_lahir') ?? $datapegawai->tgl_lahir }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Oleh Pejabat
                                                        :</label>
                                                    <input type="text" name="olehpejabat" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('olehpejabat') ?? $datapegawai->olehpejabat }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal :</label>
                                                    <input type="date" name="tgl" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('tgl') ?? $datapegawai->tgl }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tanggal Mulai
                                                        Berlakunya Gaji :</label>
                                                    <input type="date" name="tgl_gaji" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('tgl_gaji') ?? $datapegawai->pegawaiKgb[0]->tgl_gaji }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Masa Kerja
                                                        Golongan Pada Tanggal Tersebut :</label>
                                                    <input type="text" name="masakerja_tgl" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('masakerja_tgl') ?? $datapegawai->pegawaiKgb[0]->masakerja_tgl }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Gaji Pokok Baru
                                                        :</label>
                                                    <input type="text" name="gajibaru" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('gajibaru') ?? $datapegawai->pegawaiKgb[0]->gajibaru }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Berdasarkan Masa
                                                        Kerja :</label>
                                                    <input type="text" name="masakerja" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('masakerja') ?? $datapegawai->pegawaiKgb[0]->masakerja }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Dalam Golongan
                                                        Ruang :</label>
                                                    <input type="text" name="gol_ruang" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('gol_ruang') ?? $datapegawai->pegawaiKgb[0]->gol_ruang }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Mulai Tanggal
                                                        :</label>
                                                    <input type="date" name="mulai_tgl" class="form-control"
                                                        id="recipient-name"
                                                        value="{{ old('mulai_tgl') ?? $datapegawai->pegawaiKgb[0]->mulai_tgl }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
