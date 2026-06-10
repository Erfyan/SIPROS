/* ===== TOAST NOTIFICATION SYSTEM ===== */
class ToastNotification {
    constructor() {
        this.container = document.querySelector('.toast-container') || this.createContainer();
    }

    createContainer() {
        const container = document.createElement('div');
        container.className = 'toast-container';
        container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        `;
        document.body.appendChild(container);
        return container;
    }

    show(message, type = 'success', duration = 3000) {
        const toast = document.createElement('div');
        const bgColor = type === 'success' ? 'rgba(40, 167, 69, 0.2)' : 'rgba(220, 53, 69, 0.2)';
        const borderColor = type === 'success' ? '#28a745' : '#dc3545';
        const textColor = type === 'success' ? '#28a745' : '#dc3545';

        toast.style.cssText = `
            background: ${bgColor};
            border: 1px solid ${borderColor};
            color: ${textColor};
            padding: 15px 20px;
            border-radius: 10px;
            font-weight: 600;
            animation: slideInRight 0.4s ease;
            backdrop-filter: blur(10px);
            min-width: 300px;
            max-width: 400px;
        `;

        toast.textContent = message;
        this.container.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideInRight 0.4s ease reverse';
            setTimeout(() => toast.remove(), 400);
        }, duration);
    }
}

const toast = new ToastNotification();

/* ===== FORM VALIDATION ===== */
class FormValidator {
    constructor() {
        this.initValidation();
    }

    initValidation() {
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => this.handleSubmit(e, form));
            form.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('blur', () => this.validateField(input));
                input.addEventListener('focus', () => this.clearFieldError(input));
            });
        });
    }

    validateField(field) {
        // Email validation
        if (field.type === 'email') {
            const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value);
            this.setFieldState(field, isValid);
            return isValid;
        }

        // Required field validation
        if (field.hasAttribute('required')) {
            const isValid = field.value.trim() !== '';
            this.setFieldState(field, isValid);
            return isValid;
        }

        // Password minimum length
        if (field.name === 'password' || field.name === 'password_confirm') {
            const isValid = field.value.length >= 6;
            this.setFieldState(field, isValid);
            return isValid;
        }

        return true;
    }

    setFieldState(field, isValid) {
        if (isValid) {
            field.style.borderColor = '#28a745';
            field.style.boxShadow = '0 0 15px rgba(40, 167, 69, 0.2)';
        } else {
            field.style.borderColor = '#dc3545';
            field.style.boxShadow = '0 0 15px rgba(220, 53, 69, 0.2)';
        }
    }

    clearFieldError(field) {
        field.style.borderColor = 'rgba(255, 255, 255, 0.1)';
        field.style.boxShadow = 'none';
    }

    handleSubmit(e, form) {
        let isValid = true;
        form.querySelectorAll('input[required], textarea[required], input[type="email"]').forEach(field => {
            if (!this.validateField(field)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
            toast.show('Mohon isi semua field dengan benar', 'error');
        }
    }
}

const validator = new FormValidator();

/* ===== FORM SUBMISSION LOADING STATE ===== */
document.addEventListener('submit', function (e) {
    const form = e.target;
    const submitButton = form.querySelector('button[type="submit"]');

    if (submitButton) {
        const originalText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="spinner-border spinner-border-sm mr-2"></span>Loading...';
        submitButton.style.opacity = '0.7';

        // Restore button after submission (can be enhanced with actual form handling)
        setTimeout(() => {
            submitButton.disabled = false;
            submitButton.textContent = originalText;
            submitButton.style.opacity = '1';
        }, 2000);
    }
});

/* ===== INPUT FOCUS GLOW ===== */
document.querySelectorAll('input, textarea, select').forEach(input => {
    input.addEventListener('focus', function () {
        this.style.boxShadow = '0 0 20px rgba(255, 193, 7, 0.3)';
        this.style.borderColor = 'rgba(255, 193, 7, 0.5)';
    });

    input.addEventListener('blur', function () {
        this.style.boxShadow = 'none';
        this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
    });
});

/* ===== INTERACTIVE FILE UPLOAD PREVIEW ===== */
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const fileName = file.name;
            const fileSize = (file.size / 1024).toFixed(2);

            // Show file info
            let preview = document.querySelector(`[data-file-preview-for="${this.id}"]`);
            if (!preview) {
                preview = document.createElement('div');
                preview.setAttribute('data-file-preview-for', this.id);
                preview.style.cssText = `
                    margin-top: 10px;
                    padding: 10px 15px;
                    background: rgba(40, 167, 69, 0.1);
                    border: 1px solid #28a745;
                    border-radius: 8px;
                    color: #28a745;
                    font-size: 0.9rem;
                    animation: slideInUp 0.3s ease;
                `;
                this.parentElement.appendChild(preview);
            }

            preview.textContent = `✓ ${fileName} (${fileSize} KB)`;
        }
    });
});

/* ===== DROPDOWN SMOOTH ANIMATION ===== */
document.querySelectorAll('select').forEach(select => {
    select.addEventListener('focus', function () {
        this.style.boxShadow = '0 0 20px rgba(255, 193, 7, 0.3)';
    });

    select.addEventListener('blur', function () {
        this.style.boxShadow = 'none';
    });

    select.addEventListener('change', function () {
        // Show selection feedback
        this.style.borderColor = 'rgba(255, 193, 7, 0.8)';
        setTimeout(() => {
            this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
        }, 500);
    });
});

/* ===== BUTTON LOADING STATE MANAGER ===== */
class LoadingStateManager {
    setLoading(buttonSelector, isLoading = true) {
        const button = document.querySelector(buttonSelector);
        if (!button) return;

        if (isLoading) {
            button.disabled = true;
            button.dataset.originalText = button.textContent;
            button.innerHTML = `<span class="spinner-border spinner-border-sm mr-2"></span>Loading...`;
            button.style.opacity = '0.7';
        } else {
            button.disabled = false;
            button.textContent = button.dataset.originalText || 'Submit';
            button.style.opacity = '1';
        }
    }
}

const loadingManager = new LoadingStateManager();

/* ===== TOOLTIP SYSTEM ===== */
class TooltipManager {
    constructor() {
        this.initTooltips();
    }

    initTooltips() {
        document.querySelectorAll('[data-tooltip]').forEach(element => {
            element.addEventListener('mouseenter', (e) => this.show(e.target));
            element.addEventListener('mouseleave', () => this.hide());
        });
    }

    show(element) {
        const tooltipText = element.getAttribute('data-tooltip');
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = tooltipText;

        tooltip.style.cssText = `
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: #ffc107;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            white-space: nowrap;
            z-index: 10000;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 193, 7, 0.3);
            animation: slideInUp 0.2s ease;
            pointer-events: none;
        `;

        document.body.appendChild(tooltip);

        const rect = element.getBoundingClientRect();
        tooltip.style.top = (rect.top - tooltip.offsetHeight - 10) + 'px';
        tooltip.style.left = (rect.left + rect.width / 2 - tooltip.offsetWidth / 2) + 'px';

        element.dataset.tooltipElement = tooltip;
    }

    hide() {
        const tooltip = document.querySelector('.custom-tooltip');
        if (tooltip) {
            tooltip.style.animation = 'slideInUp 0.2s ease reverse';
            setTimeout(() => tooltip.remove(), 200);
        }
    }
}

const tooltipManager = new TooltipManager();

/* ===== CHARACTER COUNT FOR TEXTAREA ===== */
document.querySelectorAll('textarea[data-max-length]').forEach(textarea => {
    const maxLength = parseInt(textarea.getAttribute('data-max-length'));

    let counter = document.querySelector(`[data-counter-for="${textarea.name}"]`);
    if (!counter) {
        counter = document.createElement('small');
        counter.setAttribute('data-counter-for', textarea.name);
        counter.style.cssText = `
            display: block;
            margin-top: 5px;
            color: #888;
            font-size: 0.85rem;
        `;
        textarea.parentElement.appendChild(counter);
    }

    function updateCounter() {
        const remaining = maxLength - textarea.value.length;
        counter.textContent = `${textarea.value.length}/${maxLength} karakter`;

        if (remaining < 50) {
            counter.style.color = '#ffc107';
        } else {
            counter.style.color = '#888';
        }
    }

    textarea.addEventListener('input', updateCounter);
    updateCounter();
});

/* ===== MODAL/DIALOG CLOSE ANIMATION ===== */
document.querySelectorAll('[data-dismiss="modal"]').forEach(closeBtn => {
    closeBtn.addEventListener('click', function () {
        const modal = this.closest('.modal');
        if (modal) {
            modal.style.animation = 'fadeIn 0.3s ease reverse';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
    });
});

/* ===== ALERT AUTO-DISMISS ===== */
document.querySelectorAll('.alert[data-autoDismiss="true"]').forEach(alert => {
    const duration = parseInt(alert.getAttribute('data-dismiss-duration') || 3000);

    setTimeout(() => {
        alert.style.animation = 'slideInDown 0.3s ease reverse';
        setTimeout(() => alert.remove(), 300);
    }, duration);
});

/* ===== PREVENT MULTIPLE FORM SUBMISSIONS ===== */
const submittedForms = new Set();

document.addEventListener('submit', function (e) {
    const form = e.target;
    const formId = form.getAttribute('id') || form.getAttribute('name');

    if (submittedForms.has(formId)) {
        e.preventDefault();
        toast.show('Form sedang diproses...', 'error');
        return;
    }

    submittedForms.add(formId);
    setTimeout(() => submittedForms.delete(formId), 2000);
});

/* ===== EXPORT FOR EXTERNAL USE ===== */
window.SIPROSInteractions = {
    toast,
    validator,
    loadingManager,
    tooltipManager
};
