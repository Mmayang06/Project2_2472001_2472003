<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Draf Pengadaan - Kalab</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        noir: '#030706',
                        denim: '#20394a',
                        bone: '#f9f5ed',
                        steel: '#6196aa',
                        concrete: '#c9ccc3',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen">

    <!-- Top Navbar -->
    <header class="bg-[#20394a] text-[#f9f5ed] h-16 px-6 flex items-center shadow-md">
        <a href="/kalab/draf-pengadaan" class="flex items-center gap-2 hover:text-[#c9ccc3] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span class="font-medium">Kembali</span>
        </a>
        <div class="mx-auto font-bold text-lg">Buat Draf Pengadaan Baru</div>
    </header>

    <main class="max-w-4xl mx-auto p-6 md:p-8 mt-4">
        
        <form action="/kalab/simpan-draf" method="POST" class="bg-white rounded-2xl shadow-sm border border-[#c9ccc3]/30 overflow-hidden" id="draftForm">
            @csrf
            
            <div class="p-6 border-b border-gray-100 bg-[#f9f5ed]/30">
                <h3 class="text-xl font-bold text-[#20394a] mb-4">Informasi Umum</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Pengadaan</label>
                    <input type="number" name="tahun_pengadaan" required value="{{ date('Y') }}" min="2000" class="w-full md:w-1/3 rounded-xl border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-3 border">
                </div>
            </div>

            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-[#20394a]">Daftar Barang (Item)</h3>
                    <button type="button" onclick="addItem()" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-sm font-semibold transition-colors shadow">
                        + Tambah Barang
                    </button>
                </div>

                <div id="itemsContainer" class="space-y-6">
                    <!-- Item template will be added here -->
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <input type="hidden" name="action" id="formAction" value="simpan_draft">
                <button type="submit" onclick="document.getElementById('formAction').value='simpan_draft';" class="px-8 py-2.5 bg-[#20394a] text-white rounded-xl font-semibold hover:bg-[#6196aa] transition-colors shadow-md">
                    Simpan Draf
                </button>
            </div>
        </form>

    </main>

    <script>
        const inventarisRusak = @json($inventaris_rusak);
        let itemIndex = 0;

        function getOptionsHTML() {
            let options = '<option value="">-- Tidak menggantikan barang apapun --</option>';
            inventarisRusak.forEach(inv => {
                const label = inv.nomor_label ? inv.nomor_label : 'Belum berlabel';
                const name = inv.nama_barang ? inv.nama_barang : 'Barang tidak diketahui';
                options += `<option value="${inv.id_inventaris}">ID: ${inv.id_inventaris} - ${name} (${label}) - ${inv.kondisi}</option>`;
            });
            return options;
        }

        function addItem() {
            const container = document.getElementById('itemsContainer');
            
            const html = `
                <div class="item-row bg-white border border-gray-200 rounded-xl p-5 relative group transition-all hover:border-[#6196aa]/50 hover:shadow-md" id="item-${itemIndex}">
                    <button type="button" onclick="removeItem(${itemIndex})" class="absolute top-4 right-4 text-gray-400 hover:text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Nama Barang *</label>
                            <input type="text" name="items[${itemIndex}][nama_barang]" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2 border">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Kategori *</label>
                            <select name="items[${itemIndex}][jenis_barang]" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2 border">
                                <option value="Inventaris">Inventaris</option>
                                <option value="BHP">BHP (Barang Habis Pakai)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Jumlah Unit *</label>
                            <input type="number" name="items[${itemIndex}][jumlah]" min="1" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2 border">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Estimasi Harga Satuan *</label>
                            <input type="number" name="items[${itemIndex}][harga]" min="0" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2 border">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Link Pembelian (Opsional)</label>
                            <input type="url" name="items[${itemIndex}][link_pembelian]" placeholder="https://..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2 border">
                        </div>
                    </div>

                    <div class="bg-amber-50 p-3 rounded-lg border border-amber-100">
                        <label class="block text-xs font-bold text-amber-800 mb-1">Menggantikan Inventaris? (Opsional)</label>
                        <select name="items[${itemIndex}][id_inventaris_ganti]" class="w-full rounded-lg border-amber-200 shadow-sm focus:border-amber-400 focus:ring-amber-400 text-sm p-2 border bg-white">
                            ${getOptionsHTML()}
                        </select>
                        <p class="text-[10px] text-amber-600 mt-1">Pilih jika pembelian ini bertujuan untuk menggantikan barang yang rusak/hilang.</p>
                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }

        function removeItem(index) {
            document.getElementById(`item-${index}`).remove();
        }

        function submitForm(actionType) {
            const items = document.querySelectorAll('.item-row');
            if (items.length === 0) {
                alert('Silahkan tambah minimal 1 barang sebelum menyimpan.');
                return;
            }
            document.getElementById('draftForm').submit();
        }

        // Add first item by default
        addItem();
    </script>
</body>
</html>
