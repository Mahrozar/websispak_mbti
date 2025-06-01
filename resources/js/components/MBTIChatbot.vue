<template>
    <div class="fixed bottom-6 right-6 z-50">
        <div v-if="open" class="bg-white rounded-lg shadow-lg w-80 max-w-full">
            <div
                class="flex items-center justify-between bg-blue-600 text-white px-4 py-2 rounded-t-lg"
            >
                <span class="font-bold">MBTI Chatbot</span>
                <button @click="open = false" class="text-white">
                    &times;
                </button>
            </div>
            <div
                class="p-4 h-72 overflow-y-auto flex flex-col gap-2"
                ref="chatBody"
            >
                <div
                    v-for="(msg, idx) in messages"
                    :key="idx"
                    :class="msg.user ? 'text-right' : 'text-left'"
                >
                    <div
                        :class="
                            msg.user
                                ? 'bg-blue-100 text-blue-800'
                                : 'bg-gray-100 text-gray-800'
                        "
                        class="inline-block px-3 py-2 rounded-lg max-w-[80%]"
                    >
                        {{ msg.text }}
                    </div>
                </div>
            </div>
            <form @submit.prevent="sendMessage" class="flex border-t">
                <input
                    v-model="input"
                    type="text"
                    class="flex-1 px-3 py-2 rounded-bl-lg focus:outline-none"
                    placeholder="Tulis pertanyaan MBTI..."
                />
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-br-lg"
                >
                    Kirim
                </button>
            </form>
        </div>
        <button
            v-else
            @click="open = true"
            class="bg-blue-600 text-white rounded-full shadow-lg p-4 flex items-center gap-2 hover:bg-blue-700"
        >
            <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17 8h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2m2-4h4m-2-2v6"
                />
            </svg>
            <span class="font-bold">Chat MBTI</span>
        </button>
    </div>
</template>

<script>
// Hapus import natural dan lemmatizer karena tidak support browser
// Tambahkan stemming dan lemmatization sederhana manual
export default {
    data() {
        return {
            open: false,
            input: "",
            messages: [
                {
                    text: "Halo! Saya chatbot MBTI. Tanyakan apapun tentang kepribadian, tipe MBTI, atau rekomendasi karier.",
                    user: false,
                },
            ],
        };
    },
    methods: {
        // Kamus sinonim dan kata kunci
        normalize(msg) {
            const dictionary = {
                mbti: ["mbti", "kepribadian", "personality"],
                tipe: ["tipe", "type", "jenis", "karakter"],
                karir: [
                    "karir",
                    "pekerjaan",
                    "profesi",
                    "kerja",
                    "job",
                    "career",
                ],
                tes: ["tes", "test", "ujian", "assessment"],
                kelebihan: ["kelebihan", "kekuatan", "strength", "unggul"],
                kelemahan: ["kelemahan", "kekurangan", "lemah", "weakness"],
                halo: ["halo", "hai", "hello", "hi", "selamat"],
            };
            let result = msg;
            Object.entries(dictionary).forEach(([main, variants]) => {
                variants.forEach((v) => {
                    result = result.replace(
                        new RegExp(`\\b${v}\\b`, "gi"),
                        main
                    );
                });
            });
            return result;
        },
        simpleStem(word) {
            // Stemming manual sederhana (untuk bahasa Indonesia/Inggris)
            return word.replace(/(ing|ed|an|kan|nya|i|s)$/i, "");
        },
        simpleLemmatize(word) {
            // Lemmatization manual sederhana (untuk bahasa Inggris)
            // Contoh: "better" -> "good", "went" -> "go" (tambahkan sesuai kebutuhan)
            const lemmaDict = {
                better: "good",
                went: "go",
                gone: "go",
                running: "run",
                ran: "run",
                jobs: "job",
                careers: "career",
                tests: "test",
                // tambahkan sesuai kebutuhan
            };
            return lemmaDict[word] || word;
        },
        sendMessage() {
            if (!this.input.trim()) return;
            this.messages.push({ text: this.input, user: true });
            const userMsg = this.input.toLowerCase();
            // Tokenisasi, stemming, lalu lemmatization manual
            const stemmedMsg = userMsg
                .split(" ")
                .map(this.simpleStem)
                .join(" ");
            const lemmatizedMsg = stemmedMsg
                .split(" ")
                .map(this.simpleLemmatize)
                .join(" ");
            const normalizedMsg = this.normalize(lemmatizedMsg);
            this.input = "";
            setTimeout(() => {
                this.messages.push({
                    text: this.getBotReply(normalizedMsg),
                    user: false,
                });
                this.$nextTick(() => {
                    this.$refs.chatBody.scrollTop =
                        this.$refs.chatBody.scrollHeight;
                });
            }, 600);
        },
        getBotReply(msg) {
            // msg sudah dalam bentuk stemmed
            if (msg.includes("mbti"))
                return "MBTI adalah tes kepribadian yang membagi manusia menjadi 16 tipe berdasarkan 4 dimensi utama.";
            if (
                msg.includes("tipe") &&
                msg.match(
                    /intj|entj|infj|enfj|intp|entp|infp|enfp|istj|estj|isfj|esfj|istp|estp|isfp|esfp/
                )
            ) {
                return (
                    "Tipe " +
                    msg
                        .match(
                            /intj|entj|infj|enfj|intp|entp|infp|enfp|istj|estj|isfj|esfj|istp|estp|isfp|esfp/
                        )[0]
                        .toUpperCase() +
                    " memiliki karakteristik unik. Ingin tahu lebih detail? Tanyakan tentang kekuatan, kelemahan, atau karier yang cocok."
                );
            }
            if (msg.includes("karir") || msg.includes("pekerjaan"))
                return "Setiap tipe MBTI memiliki rekomendasi karier yang berbeda. Sebutkan tipe MBTI Anda untuk saran spesifik!";
            if (msg.includes("halo") || msg.includes("hai"))
                return "Halo juga! Ada yang ingin kamu konsultasikan tentang MBTI?";
            if (msg.includes("kelebihan") || msg.includes("kekuatan"))
                return "Setiap tipe MBTI punya kekuatan unik. Sebutkan tipe MBTI Anda untuk info lebih spesifik.";
            if (msg.includes("kelemahan"))
                return "Setiap tipe MBTI juga punya area pengembangan. Tanyakan tipe MBTI tertentu untuk info detail.";
            if (msg.includes("tes"))
                return "Untuk tes MBTI, silakan klik menu Tes MBTI di website ini.";
            return "Maaf, saya belum mengerti pertanyaan Anda. Silakan tanya seputar MBTI, tipe kepribadian, atau karier.";
        },
    },
};
</script>

<style scoped>
/* Custom style for chatbot */
</style>
