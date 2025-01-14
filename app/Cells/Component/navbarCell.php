<?php

namespace App\Cells\Component;

use CodeIgniter\View\Cells\Cell;

class navbarCell extends Cell
{
    public $role;
    public $menus = [];

    // array $roles
    public function mount(array $roles)
    {
        $this->role = $roles;
        if (auth()->user()->inGroup('admin')) {
            $url = 'admin/dashboard';
        } else if (auth()->user()->inGroup('siswa')) {
            $url = 'siswa/dashboard';
        } else {
            $url = '/';
        }

        dd($url, auth()->user()->getGroups());
        // Definisi menu dan role yang memiliki akses
        $menuConfig = [
            [
                'id'      => 'home',
                'title'   => 'Home',
                'url'     => $url,
                'icon'    => '<span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>',
                'submenu' => [],
                'roles'   => ['admin', 'user', 'editor'], // Role yang memiliki akses
            ],
            [
                'id'      => 'cSiswa',
                'title'   => 'Calon Siswa',
                'url'     => '#',
                'icon'    => '<span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
            </span>',
                // 'submenu' => [
                // ['title' => 'List', 'url' => '#'],
                // [
                //     'title' => 'Karir', 
                //     'url' => '#',
                //     'submenu1' => [
                //         [
                //             'title' => 'Statistik',
                //             'url' => '#',
                //         ],
                //         [
                //             'title' => 'List',
                //             'url' => '#'
                //         ]
                //     ]
                // ],
                // ],
                'roles'   => ['admin'], // Hanya editor
            ],
            [
                'id'      => 'siswa',
                'title'   => 'Siswa',
                'url'     => '#',
                'icon'    => '<span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
            </span>',
                'roles'   => ['admin'], // Hanya admin
            ],
            [
                'id'      => 'pengaturan',
                'title'   => 'Pengaturan',
                'url'     => '#pengaturan',
                'icon'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            </svg>',
                'submenu' => [
                    ['title' => 'Gelombang', 'url' => '#'],
                    ['title' => 'Berkas', 'url' => '#'],
                    ['title' => 'User', 'url' => '#'],
                ],
                'roles'   => ['admin'], // Hanya admin
            ],
        ];

        // Filter menu berdasarkan role
        $this->menus = array_filter($menuConfig, function ($menu) use ($roles) {
            return !empty(array_intersect($menu['roles'], $roles));
        });
    }

    public function render(): string
    {
        return view('Cells\Component\navbar', ['menus' => $this->menus]);
    }
}
