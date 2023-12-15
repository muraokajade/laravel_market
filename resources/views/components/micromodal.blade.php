<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
  <!-- 背景のオーバーレイ -->
  <div class="modal-overlay" tabindex="-1" data-micromodal-close>
    <div
      class="modal-container"
      role="dialog"
      aria-modal="true"
      aria-labelledby="modal-1-title"
    >
      <header class="modal-header">
        <h2 class="modal-title" id="modal-1-title">Micromodal</h2>
        <!-- 閉じるボタン -->
        <button
          class="modal-close"
          aria-label="Close modal"
          data-micromodal-close
        ></button>
      </header>
      <!-- モーダルのコンテンツ -->
      <div class="modal-content" id="modal-1-content">
        Modal Content
      </div>
    </div>
  </div>
</div>
<!-- 開くボタン -->
<button data-micromodal-trigger="modal-1" class="modal-open">
  open
</button>