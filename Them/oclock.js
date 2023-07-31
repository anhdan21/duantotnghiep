function getCurrentTime() {
    // Tạo đối tượng Date đại diện cho thời gian hiện tại
    const now = new Date();

    // Lấy thông tin về giờ, phút và giây
    const hour = now.getHours();
    const minute = now.getMinutes();
    const second = now.getSeconds();

    // Định dạng lại chuỗi để hiển thị đẹp hơn (nếu muốn)
    const formattedTime = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}:${second.toString().padStart(2, '0')}`;

    // Hiển thị giờ hiện tại trong thẻ p có id="current-time"
    document.getElementById('current-time').textContent = formattedTime;
}

// Gọi hàm getCurrentTime mỗi giây một lần để cập nhật giờ hiện tại
setInterval(getCurrentTime, 1000);
function getCurrentDate() {
    // Tạo đối tượng Date đại diện cho thời gian hiện tại
    const now = new Date();

    // Lấy thông tin về ngày, tháng và năm
    const day = now.getDate();
    const month = now.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0 (0 -> Tháng 1)
    const year = now.getFullYear();

    // Định dạng lại chuỗi để hiển thị đẹp hơn (nếu muốn)
    const formattedDate = `${day.toString().padStart(2, '0')}/${month.toString().padStart(2, '0')}/${year}`;

    // Hiển thị ngày hiện tại trong thẻ p có id="current-date"
    document.getElementById('current-date').textContent = formattedDate;
}

// Gọi hàm getCurrentDate khi trang được tải và sau đó mỗi ngày một lần để cập nhật ngày hiện tại
getCurrentDate();