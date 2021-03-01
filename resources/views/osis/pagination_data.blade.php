                      <?php $no=1; ?>
                      @foreach($data as $row)
                        <tr>
                          <td style="text-align: center;">{{$no++}}</td>
                          <td>{{$row->nama_siswa}}</td>
                          <td style="text-align: center;">{{$row->kelas->nama_kelas}}</td>
                          <td style="text-align: center;">{{$row->pukul_telat}} WIB</td>
                          <td style="text-align: center;">{{$row->batas_waktu_sanksi}} WIB</td>
                          <td style="text-align: center;">

                            @if($row->ket_sanksi == 'belum dikonfirmasi')
                              <div class="" >
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_sudah" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="sudah" name="ket_sanksi">
                                      <button type="submit" class="btn btn-info btn-sm" name="ket_sanksi">
                                          <i class="fa fa-check"></i>
                                      </button>
                                  </form>
                                  <form style="display: inline-block;" action="/siswa-telat/{{$row->id}}/update_belum" method="POST">
                                    {{csrf_field()}}
                                      <input type="hidden" value="belum" name="ket_sanksi">
                                      <button type="submit" class="btn btn-theme04 btn-sm" name="ket_sanksi">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                                </div>
                            @elseif($row->ket_sanksi == 'sudah' or 'belum')
                                    {{$row->ket_sanksi}}
                            @endif

                          </td>
                          <td style="text-align: center;">
                                    <a href="/siswa-telat/{{$row->id}}/edit" class="btn btn-warning btn-sm">
                                      <i class="fa fa-pencil"></i>
                                    </a>
                                    </a>
                                    <a href="/siswa-telat/{{$row->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')">
                                      <i class="fa fa-trash-o "></i>
                                    </a>
                          </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="7"><center>{{$data->links()}}</center></td>
                      </tr>