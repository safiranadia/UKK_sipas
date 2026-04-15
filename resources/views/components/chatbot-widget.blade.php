<!-- Chatbot Widget Floating -->
<style>
.chatbot-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    font-family: system-ui, -apple-system, sans-serif;
}

.chatbot-toggle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5);
}

.chatbot-box {
    position: absolute;
    bottom: 80px;
    right: 0;
    width: 380px;
    max-width: 90vw;
    height: 520px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    display: none;
    flex-direction: column;
    overflow: hidden;
}

.chatbot-box.active {
    display: flex;
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.chatbot-header {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    color: white;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.chatbot-header-info h4 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.chatbot-header-info span {
    font-size: 12px;
    opacity: 0.8;
}

.chatbot-messages {
    flex: 1;
    overflow-y: auto;
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: #f8fafc;
}

.chat-message {
    max-width: 80%;
    padding: 12px 16px;
    border-radius: 18px;
    font-size: 14px;
    line-height: 1.5;
}

.chat-message.user {
    align-self: flex-end;
    background: #2563eb;
    color: white;
    border-bottom-right-radius: 4px;
}

.chat-message.bot {
    align-self: flex-start;
    background: white;
    color: #1e293b;
    border-bottom-left-radius: 4px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.chatbot-footer {
    padding: 12px 16px;
    background: white;
    border-top: 1px solid #e2e8f0;
    display: flex;
    gap: 10px;
}

.chatbot-footer input {
    flex: 1;
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    outline: none;
    font-size: 14px;
}

.chatbot-footer input:focus {
    border-color: #2563eb;
}

.chatbot-footer button {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #2563eb;
    border: none;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.typing-indicator {
    display: flex;
    gap: 4px;
    padding: 12px 16px;
    background: white;
    border-radius: 18px;
    border-bottom-left-radius: 4px;
    align-self: flex-start;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: #cbd5e1;
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-6px); }
}

.quick-questions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    padding: 0 16px 12px;
    background: #f8fafc;
}

.quick-btn {
    padding: 6px 12px;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s;
}

.quick-btn:hover {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}
</style>

<div class="chatbot-container">
    <button class="chatbot-toggle" onclick="toggleChatbot()">
        💬
    </button>

    <div class="chatbot-box" id="chatbotBox">
        <div class="chatbot-header">
            <div class="chatbot-avatar">🤖</div>
            <div class="chatbot-header-info">
                <h4>SIPAS Assistant</h4>
                <span>Selalu siap membantu</span>
            </div>
        </div>

        <div class="quick-questions">
            <button class="quick-btn" onclick="sendQuickQuestion('Bagaimana cara membuat laporan?')">Cara buat laporan</button>
            <button class="quick-btn" onclick="sendQuickQuestion('Berapa lama laporan diproses?')">Waktu proses</button>
            <button class="quick-btn" onclick="sendQuickQuestion('Bagaimana lihat status laporan?')">Status laporan</button>
        </div>

        <div class="chatbot-messages" id="chatMessages">
            <div class="chat-message bot">
                👋 Halo! Saya asisten SIPAS. Silahkan ajukan pertanyaan seputar sistem pelaporan ini.
            </div>
        </div>

        <div class="chatbot-footer">
            <input type="text" id="chatInput" placeholder="Ketik pesan anda..." onkeypress="if(event.key === 'Enter') sendMessage()">
            <button onclick="sendMessage()">➤</button>
        </div>
    </div>
</div>

<script>
function toggleChatbot() {
    const box = document.getElementById('chatbotBox');
    box.classList.toggle('active');
}

function sendQuickQuestion(question) {
    document.getElementById('chatInput').value = question;
    sendMessage();
}

async function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    if(!message) return;

    const messagesContainer = document.getElementById('chatMessages');
    
    // Add user message
    messagesContainer.innerHTML += `<div class="chat-message user">${message}</div>`;
    input.value = '';
    
    // Scroll to bottom
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    // Show typing indicator
    const typingId = 'typing-' + Date.now();
    messagesContainer.innerHTML += `<div class="typing-indicator" id="${typingId}"><span></span><span></span><span></span></div>`;
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    // Send request
    try {
        const response = await fetch('{{ route("api.chatbot") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: message })
        });

        const data = await response.json();
        
        // Remove typing
        document.getElementById(typingId).remove();

        // Add bot reply
        messagesContainer.innerHTML += `<div class="chat-message bot">${data.reply}</div>`;
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

    } catch (error) {
        document.getElementById(typingId).remove();
        messagesContainer.innerHTML += `<div class="chat-message bot">⚠️ Terjadi kesalahan, silahkan coba lagi.</div>`;
    }
}
</script>