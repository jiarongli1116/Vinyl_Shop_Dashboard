<?php
include "../vars.php";
$cssList = ["../css/index.css","../css/add.css"];
include "../template_top.php";
include "../template_main.php";
?>

<div class="content-section">
    <div class="section-header">
        <h3 class="section-title">新增會員</h3>
        <a href="index.php" class="btn btn-secondary">回會員列表</a>
    </div>
    <div class="form-container">
        <form id="addMemberForm" action="doAddMember.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <h4 class="form-section-title">基本資料</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="memberName" class="form-label required">會員姓名</label>
                        <input type="text" id="memberName" name="name" class="form-control" required>
                        <div class="error-message" id="nameError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="memberEmail" class="form-label required">Email</label>
                        <input type="email" id="memberEmail" name="email" class="form-control" required>
                        <div class="error-message" id="emailError"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="memberPhone" class="form-label">電話號碼</label>
                        <input type="tel" id="memberPhone" name="phone" class="form-control" 
                               pattern="[0-9\-\+\s\(\)]{8,15}" placeholder="例：0912-345-678">
                        <div class="error-message" id="phoneError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="memberBirthday" class="form-label">生日</label>
                        <input type="date" id="memberBirthday" name="birthday" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="memberGender" class="form-label">性別</label>
                        <select id="memberGender" name="gender" class="form-control">
                            <option value="">請選擇</option>
                            <option value="男">男</option>
                            <option value="女">女</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="memberLevel" class="form-label required">會員等級</label>
                        <select id="memberLevel" name="level" class="form-control" required>
                            <option value="">請選擇等級</option>
                            <option value="一般會員">一般會員</option>
                            <option value="VIP會員">VIP會員</option>
                            <option value="黑膠收藏家">黑膠收藏家</option>
                        </select>
                        <div class="error-message" id="levelError"></div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="form-section-title">聯絡資訊</h4>
                
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="memberAddress" class="form-label">地址</label>
                        <input type="text" id="memberAddress" name="address" class="form-control" 
                               placeholder="例：台北市中正區中山南路21號">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="form-section-title">帳戶設定</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="memberPassword" class="form-label required">密碼</label>
                        <input type="password" id="memberPassword" name="password" class="form-control" 
                               minlength="6" required placeholder="至少6個字元">
                        <div class="error-message" id="passwordError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword" class="form-label required">確認密碼</label>
                        <input type="password" id="confirmPassword" name="confirm_password" 
                               class="form-control" required>
                        <div class="error-message" id="confirmPasswordError"></div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="form-section-title">其他設定</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="memberAvatar" class="form-label">頭像</label>
                        <input type="file" id="memberAvatar" name="avatar" class="form-control" 
                               accept="image/*">
                        <small class="form-text">支援 JPG、PNG、GIF 格式，檔案大小不超過 2MB</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <div class="form-check">
                            <input type="checkbox" id="emailNotification" name="email_notification" 
                                   class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="emailNotification">
                                接收Email通知
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="memberNote" class="form-label">備註</label>
                        <textarea id="memberNote" name="note" class="form-control" rows="3" 
                                  placeholder="其他相關資訊..."></textarea>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='members.php'">
                    <i class="fas fa-times"></i> 取消
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="fas fa-undo"></i> 重置
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> 儲存會員
                </button>
            </div>
        </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

<?php
include "../template_btm.php";
?>
