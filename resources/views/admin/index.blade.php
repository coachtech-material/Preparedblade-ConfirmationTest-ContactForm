<x-app-layout>
    <x-slot name="header">
        <form action="/logout" method="post">
            @csrf
            <button class="px-5 py-1.5 border border-[#ddd8d3] text-[#c4bab0] bg-white rounded hover:bg-gray-50 transition lowercase text-sm">logout</button>
        </form>
    </x-slot>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Adminタイトル -->
            <h2 class="text-center text-2xl font-serif text-amber-900 mb-6">Admin</h2>

            <!-- 検索フォーム -->
            <div class="mb-4">
                <form class="flex flex-wrap items-center gap-3" action="/admin/search" method="get">
                    <div class="flex-1 min-w-[200px]">
                        <input id="keyword-input" type="text" name="keyword" value="{{ $request->keyword ?? '' }}"
                            placeholder="名前やメールアドレスを入力してください"
                            class="w-full px-4 py-2 bg-white border border-[#ddd8d3] rounded text-gray-700 placeholder-[#c4bab0] focus:outline-none focus:border-amber-500" />
                    </div>
                    <div class="min-w-[100px]">
                        <select id="gender-select" name="gender"
                            class="w-full px-4 py-2 bg-white border border-[#ddd8d3] rounded text-[#9a938c] focus:outline-none focus:border-amber-500">
                            <option value="0">性別</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                            <option value="3">その他</option>
                        </select>
                    </div>
                    <div class="min-w-[160px]">
                        <select id="category-select" name="category_id"
                            class="w-full px-4 py-2 bg-white border border-[#ddd8d3] rounded text-[#9a938c] focus:outline-none focus:border-amber-500">
                            <option value="" disabled>お問い合わせの種類</option>
                        </select>
                    </div>
                    <div class="min-w-[130px]">
                        <input id="date-input" type="date" name="date" value="{{ $request->date ?? '' }}"
                            placeholder="年/月/日"
                            class="w-full px-4 py-2 bg-white border border-[#ddd8d3] rounded text-[#9a938c] focus:outline-none focus:border-amber-500" />
                    </div>
                    <div>
                        <button type="submit" class="px-6 py-2 bg-[#82746a] text-white rounded hover:bg-[#6b5f57]">
                            検索
                        </button>
                    </div>
                    <div>
                        <a href="/admin"
                            class="px-6 py-2 bg-[#e8ddd2] text-[#9a938c] rounded hover:bg-[#ddd2c7] inline-block">
                            リセット
                        </a>
                    </div>
                </form>
            </div>

            <!-- ページネーション -->
            <div class="mb-4 flex justify-end items-center">
                <div id="pagination-container" class="flex items-center gap-1"></div>
            </div>

            <!-- テーブル -->
            <div class="bg-white rounded overflow-hidden border border-gray-200">
                <table class="w-full">
                    <thead>
                        <tr class="bg-[#a89e94]">
                            <th class="px-6 py-3 text-left text-sm font-medium text-white">お名前</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white">性別</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white">メールアドレス</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white">お問い合わせの種類</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white"></th>
                        </tr>
                    </thead>
                    <tbody id="contacts-tbody" class="divide-y divide-gray-200">
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">読み込み中...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- 管理画面用の詳細モーダル -->
    <div id="detail-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center hidden">
        <div class="bg-white rounded border border-gray-200 max-w-2xl w-full mx-4 relative">
            <div class="flex justify-end p-4">
                <button id="close-modal" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">
                    ×
                </button>
            </div>
            <div class="modal__body px-6 pb-6">
                <!-- 詳細情報はここにJSで挿入される -->
            </div>
        </div>
    </div>

    @push('scripts')
        @vite(['resources/js/admin/index.js'])
    @endpush
</x-app-layout>
