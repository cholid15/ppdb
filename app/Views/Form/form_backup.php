<?= $this->extend('Layout/Base'); ?>

<?= $this->section('style'); ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div class="container-xl">
    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lengkapi Biodata</h3>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true" id="biodata">
                        1. Biodata
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="alamat">
                        2. Alamat
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="asalSekolah">
                        3. Asal Sekolah
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="ayah">
                        4. Ayah
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="ibu">
                        5. Ibu
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" id="wali">
                        6. Wali
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <!-- Form Section -->
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <!-- Biodata -->
                        <div class="row" id="biodataRow">
                            <div class="col-6 mb-3">
                                <label class="form-label">Text</label>
                                <input type="text" class="form-control" name="example-text-input"
                                    placeholder="Input placeholder">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="example-password-input"
                                    placeholder="Input placeholder">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="row d-none" id="alamatRow">
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="example-address-input"
                                    placeholder="Masukkan alamat">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const sections = {
        biodata: document.getElementById("biodataRow"),
        alamat: document.getElementById("alamatRow"),
        asalSekolah: null, // Tambahkan ID untuk form terkait jika ada
        ayah: null,
        ibu: null,
        wali: null
    };

    // Handle menu clicks
    document.querySelectorAll(".list-group-item").forEach(item => {
        item.addEventListener("click", function(e) {
            e.preventDefault();

            // Remove active class from all menu items
            document.querySelectorAll(".list-group-item").forEach(menu => menu.classList.remove(
                "active"));

            // Add active class to the clicked item
            this.classList.add("active");

            // Hide all sections
            Object.values(sections).forEach(section => {
                if (section) section.classList.add("d-none");
            });

            // Show the selected section
            const sectionId = this.id + "Row";
            if (sections[this.id]) {
                sections[this.id].classList.remove("d-none");
            }
        });
    });
});
</script>
<?= $this->endSection(); ?>