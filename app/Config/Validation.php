<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $calonSiswa = [
        // Validasi Biodata
        // 'no_pendaftaran' => [
        //     'rules' => 'required|is_unique[calon_siswa.no_pendaftaran]',
        //     'errors' => [
        //         'required' => 'Nomor pendaftaran harus diisi',
        //         'is_unique' => 'Nomor pendaftaran sudah terdaftar'
        //     ]
        // ],
        'id_sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Sekolah harus dipilih'
            ]
        ],
        'nis' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIS harus diisi',
                'is_unique' => 'NIS sudah terdaftar'
            ]
        ],
        'nisn' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NISN harus diisi',
                'is_unique' => 'NISN sudah terdaftar'
            ]
        ],
        'nik' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'NIK harus diisi',
                'exact_length' => 'NIK harus 16 digit',
                'is_unique' => 'NIK sudah terdaftar'
            ]
        ],
        'nama' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter'
            ]
        ],
        'no_kk' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NO KK harus diisi',
                'is_unique' => 'NO KK sudah terdaftar'
            ]
        ],
        'no_akta_lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NO Akta Lahir harus diisi',
            ]
        ],
        'tmpt_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jk' => 'required',
        'tinggi_badan' => 'required',
        'berat_badan' => 'required',
        'anak_ke' => 'required',
        'jml_saudara' => 'required',
        'agama' => 'required',
        'email' => [
            'rules' => 'valid_email',
            'errors' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Format email tidak valid.',
            ],
        ],
        'pendidikan_terakhir' => 'required',
        'asal_sekolah' => 'required',
        'no_hp' => 'required',

        // Validasi Alamat
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        'provinsi' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
        'kode_pos' => 'required',

        // Validasi Orang Tua
        'ortu_no_ktp' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'No KTP Orang Tua harus diisi',
                'exact_length' => 'No KTP harus 16 digit'
            ]
        ],
        'ortu_no_kk' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'No KK Orang Tua harus diisi',
                'exact_length' => 'No KK harus 16 digit'
            ]
        ],
        'nama_ortu' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter'
            ]
        ],
        'tgl_lahir_ortu' => 'required',
        'jk_ortu' => 'required',
        'jenjang_asal_ortu' => 'required',
        'no_hp_ortu' => 'required',
        'pekerjaan_ortu' => 'required',
        'rentang_gaji_ortu' => 'required',


        // Tambahkan rules untuk file upload
        // 'foto' => [
        //     'rules' => 'max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        //     'errors' => [
        //         'uploaded' => 'Pass foto 4x6 harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
        //     ]
        // ],
        // 'akta_kelahiran' => [
        //     'rules' => 'max_size[akta_kelahiran,5120]|mime_in[akta_kelahiran,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Akta kelahiran harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_keluarga' => [
        //     'rules' => 'max_size[kartu_keluarga,5120]|mime_in[kartu_keluarga,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu keluarga harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ijazah' => [
        //     'rules' => 'max_size[ijazah,5120]|mime_in[ijazah,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Ijazah harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_nisn' => [
        //     'rules' => 'max_size[kartu_nisn,5120]|mime_in[kartu_nisn,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu NISN harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'raport' => [
        //     'rules' => 'max_size[raport,5120]|mime_in[raport,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Raport harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kip' => [
        //     'rules' => 'max_size[kip,5120]|mime_in[kip,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KIP harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ktp_ortu' => [
        //     'rules' => 'max_size[ktp_ortu,5120]|mime_in[ktp_ortu,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KTP Orang Tua harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'akte_kematian' => [
        //     'rules' => 'permit_empty|max_size[akte_kematian,5120]|mime_in[akte_kematian,application/pdf]',
        //     'errors' => [
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ]






        // dimatikan sementara untuk jaga jaga
        // 'foto' => [
        //     'rules' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        //     'errors' => [
        //         'uploaded' => 'Pass foto 4x6 harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
        //     ]
        // ],
        // 'akta_kelahiran' => [
        //     'rules' => 'uploaded[akta_kelahiran]|max_size[akta_kelahiran,5120]|mime_in[akta_kelahiran,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Akta kelahiran harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_keluarga' => [
        //     'rules' => 'uploaded[kartu_keluarga]|max_size[kartu_keluarga,5120]|mime_in[kartu_keluarga,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu keluarga harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ijazah' => [
        //     'rules' => 'uploaded[ijazah]|max_size[ijazah,5120]|mime_in[ijazah,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Ijazah harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_nisn' => [
        //     'rules' => 'uploaded[kartu_nisn]|max_size[kartu_nisn,5120]|mime_in[kartu_nisn,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu NISN harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'raport' => [
        //     'rules' => 'uploaded[raport]|max_size[raport,5120]|mime_in[raport,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Raport harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kip' => [
        //     'rules' => 'uploaded[kip]|max_size[kip,5120]|mime_in[kip,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KIP harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ktp_ortu' => [
        //     'rules' => 'uploaded[ktp_ortu]|max_size[ktp_ortu,5120]|mime_in[ktp_ortu,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KTP Orang Tua harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'akte_kematian' => [
        //     'rules' => 'permit_empty|max_size[akte_kematian,5120]|mime_in[akte_kematian,application/pdf]',
        //     'errors' => [
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ]
    ];



    public $calonSiswaUpdate = [
        // Validasi Biodata
        // 'no_pendaftaran' => [
        //     'rules' => 'required|is_unique[calon_siswa.no_pendaftaran]',
        //     'errors' => [
        //         'required' => 'Nomor pendaftaran harus diisi',
        //         'is_unique' => 'Nomor pendaftaran sudah terdaftar'
        //     ]
        // ],
        'id_sekolah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Sekolah harus dipilih'
            ]
        ],
        'nis' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIS harus diisi',
                'is_unique' => 'NIS sudah terdaftar'
            ]
        ],
        'nisn' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NISN harus diisi',
                'is_unique' => 'NISN sudah terdaftar'
            ]
        ],
        'nik' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'NIK harus diisi',
                'exact_length' => 'NIK harus 16 digit',
                'is_unique' => 'NIK sudah terdaftar'
            ]
        ],
        'nama' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter'
            ]
        ],
        'no_kk' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NO KK harus diisi',
                'is_unique' => 'NO KK sudah terdaftar'
            ]
        ],
        'no_akta_lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NO Akta Lahir harus diisi',
            ]
        ],
        'tmpt_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jk' => 'required',
        'tinggi_badan' => 'required',
        'berat_badan' => 'required',
        'anak_ke' => 'required',
        'jml_saudara' => 'required',
        'agama' => 'required',
        'email' => [
            'rules' => 'valid_email',
            'errors' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Format email tidak valid.',
            ],
        ],
        'pendidikan_terakhir' => 'required',
        'asal_sekolah' => 'required',
        'no_hp' => 'required',

        // Validasi Alamat
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        'provinsi' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
        'kode_pos' => 'required',

        // Validasi Orang Tua
        'ortu_no_ktp' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'No KTP Orang Tua harus diisi',
                'exact_length' => 'No KTP harus 16 digit'
            ]
        ],
        'ortu_no_kk' => [
            'rules' => 'required|exact_length[16]',
            'errors' => [
                'required' => 'No KK Orang Tua harus diisi',
                'exact_length' => 'No KK harus 16 digit'
            ]
        ],
        'nama_ortu' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'min_length' => 'Nama minimal 3 karakter'
            ]
        ],
        'tgl_lahir_ortu' => 'required',
        'jk_ortu' => 'required',
        'jenjang_asal_ortu' => 'required',
        'no_hp_ortu' => 'required',
        'pekerjaan_ortu' => 'required',
        'rentang_gaji_ortu' => 'required',


        // Tambahkan rules untuk file upload
        // 'foto' => [
        //     'rules' => 'max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        //     'errors' => [
        //         'uploaded' => 'Pass foto 4x6 harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
        //     ]
        // ],
        // 'akta_kelahiran' => [
        //     'rules' => 'max_size[akta_kelahiran,5120]|mime_in[akta_kelahiran,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Akta kelahiran harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_keluarga' => [
        //     'rules' => 'max_size[kartu_keluarga,5120]|mime_in[kartu_keluarga,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu keluarga harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ijazah' => [
        //     'rules' => 'max_size[ijazah,5120]|mime_in[ijazah,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Ijazah harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_nisn' => [
        //     'rules' => 'max_size[kartu_nisn,5120]|mime_in[kartu_nisn,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu NISN harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'raport' => [
        //     'rules' => 'max_size[raport,5120]|mime_in[raport,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Raport harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kip' => [
        //     'rules' => 'max_size[kip,5120]|mime_in[kip,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KIP harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ktp_ortu' => [
        //     'rules' => 'max_size[ktp_ortu,5120]|mime_in[ktp_ortu,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KTP Orang Tua harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'akte_kematian' => [
        //     'rules' => 'permit_empty|max_size[akte_kematian,5120]|mime_in[akte_kematian,application/pdf]',
        //     'errors' => [
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ]






        // dimatikan sementara untuk jaga jaga
        // 'foto' => [
        //     'rules' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        //     'errors' => [
        //         'uploaded' => 'Pass foto 4x6 harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus JPG, JPEG, atau PNG'
        //     ]
        // ],
        // 'akta_kelahiran' => [
        //     'rules' => 'uploaded[akta_kelahiran]|max_size[akta_kelahiran,5120]|mime_in[akta_kelahiran,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Akta kelahiran harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_keluarga' => [
        //     'rules' => 'uploaded[kartu_keluarga]|max_size[kartu_keluarga,5120]|mime_in[kartu_keluarga,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu keluarga harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ijazah' => [
        //     'rules' => 'uploaded[ijazah]|max_size[ijazah,5120]|mime_in[ijazah,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Ijazah harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kartu_nisn' => [
        //     'rules' => 'uploaded[kartu_nisn]|max_size[kartu_nisn,5120]|mime_in[kartu_nisn,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Kartu NISN harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'raport' => [
        //     'rules' => 'uploaded[raport]|max_size[raport,5120]|mime_in[raport,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'Raport harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'kip' => [
        //     'rules' => 'uploaded[kip]|max_size[kip,5120]|mime_in[kip,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KIP harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'ktp_ortu' => [
        //     'rules' => 'uploaded[ktp_ortu]|max_size[ktp_ortu,5120]|mime_in[ktp_ortu,application/pdf]',
        //     'errors' => [
        //         'uploaded' => 'KTP Orang Tua harus diupload',
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ],
        // 'akte_kematian' => [
        //     'rules' => 'permit_empty|max_size[akte_kematian,5120]|mime_in[akte_kematian,application/pdf]',
        //     'errors' => [
        //         'max_size' => 'Ukuran file maksimal 5MB',
        //         'mime_in' => 'Format file harus PDF'
        //     ]
        // ]
    ];
}
