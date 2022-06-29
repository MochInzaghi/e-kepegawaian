                                            <div class="modal-body">
                                                <input type="hidden" name="data_pegawai_id"
                                                    value="{{ $datakgb->getPegawai->id }}">
                                                <div class="form-group">
                                                    <label for="nama">Nama Pegawai</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        name="namapegawai"
                                                        value="{{ old('namapegawai') ?? $datakgb->getPegawai->namapegawai }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" id="nip" name="nip"
                                                        value="{{ old('nip') ?? $datakgb->getPegawai->nip }}" disabled>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tanggal Lahir
                                                            :</label>
                                                        <input type="date" name="tgl_lahir" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('tgl_lahir') ?? $datakgb->tgl_lahir }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Oleh Pejabat
                                                            :</label>
                                                        <input type="text" name="olehpejabat" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('olehpejabat') ?? $datakgb->olehpejabat }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tanggal :</label>
                                                        <input type="date" name="tgl" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('tgl') ?? $datakgb->tgl }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tanggal Mulai
                                                            Berlakunya Gaji :</label>
                                                        <input type="date" name="tgl_gaji" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('tgl_gaji') ?? $datakgb->tgl_gaji }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Masa Kerja
                                                            Golongan Pada Tanggal Tersebut :</label>
                                                        <input type="text" name="masakerja_tgl" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('masakerja_tgl') ?? $datakgb->masakerja_tgl }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Gaji Pokok Baru
                                                            :</label>
                                                        <input type="text" name="gajibaru" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('gajibaru') ?? $datakgb->gajibaru }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Berdasarkan Masa
                                                            Kerja :</label>
                                                        <input type="text" name="masakerja" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('masakerja') ?? $datakgb->masakerja }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Dalam Golongan
                                                            Ruang :</label>
                                                        <input type="text" name="gol_ruang" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('gol_ruang') ?? $datakgb->gol_ruang }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Mulai Tanggal
                                                            :</label>
                                                        <input type="date" name="mulai_tgl" class="form-control"
                                                            id="recipient-name"
                                                            value="{{ old('mulai_tgl') ?? $datakgb->mulai_tgl }}"
                                                            disabled>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                     