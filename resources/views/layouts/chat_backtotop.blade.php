<!-- ================= Nút BackToTop ================= -->
<button
  id="backToTop"
  class="btn btn-dark shadow d-flex align-items-center justify-content-center"
  style="
    display: none;
    position: fixed;
    bottom: 80px;
    right: 20px;
    z-index: 1030;
    font-size: large;
  "
>
  <strong>Lên đầu</strong>
  <i class="fa-solid fa-up-long ms-1" style="color: #fcfcfd"></i>
</button>

<!-- ================= Nút Tư vấn + Khung chat ================= -->
<button
  class="btn shadow d-none d-md-block"
  style="
    background-color: #db2f17;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1050;
    color: white;
    font-size: large;
  "
  type="button"
  data-bs-toggle="collapse"
  data-bs-target="#chatCollapse"
  aria-expanded="false"
  aria-controls="chatCollapse"
>
  <strong>Tư vấn</strong><i class="fa-regular fa-comments ms-1"></i>
</button>

<div
  class="collapse position-fixed end-0 p-3"
  id="chatCollapse"
  style="width: 300px; bottom: 80px; z-index: 1040"
>
  <div class="card shadow" style="height: 400px">
    <div class="card-header text-white d-flex" style="background-color: #db2f17">
      <h4 class="mt-1 me-auto">Hỗ trợ trực tuyến</h4>
      <button
        type="button"
        class="btn-close mt-2"
        aria-label="Close"
        data-bs-toggle="collapse"
        data-bs-target="#chatCollapse"
        aria-controls="chatCollapse"
      ></button>
    </div>
    <div class="card-body overflow-auto">
      <p class="text-muted small">Xin chào! Chúng tôi có thể giúp gì cho bạn?</p>
    </div>
    <div class="card-footer">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập tin nhắn..." />
        <button class="btn" style="background-color: #db2f17; color: white">
          <strong>Gửi</strong>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ================= Script ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Hiện/ẩn BackToTop
  window.addEventListener("scroll", function () {
    const btn = document.getElementById("backToTop");
    if (document.documentElement.scrollTop > 100 || document.body.scrollTop > 100) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  });

  // Cuộn mượt lên đầu
  document.getElementById("backToTop").addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>
