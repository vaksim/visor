(setq show-paren-style `expression)
(show-paren-mode 2)



;;(tool-bar-mode -1)

(add-to-list 'load-path "~/.emacs.d")
;;(require `maximus)

(add-to-list `load-path "/usr/share/emacs/site-lisp")
(add-to-list `load-path "/usr/share/emacs/site-lisp/mmm")
;(require `mmm-univ)
;(require `psgml)


(add-to-list 'auto-mode-alist '("\\.org$" . org-mode))
(define-key global-map "\C-cl" 'org-store-link)
(define-key global-map "\C-ca" 'org-agenda)
(setq org-log-done t)

(require `linum)
(setq linum-format "%d ")
(linum-mode 1)
;;(global-set-key (kbd "<f12>") `linum-mode 1)

(require `ido)
(ido-mode t)
(setq ido-enable-flex-matching t)

(require `bs)
(global-set-key (kbd "<f2>") `bs-show)

;(add-to-list `load-path "~/.emacs.d/auto-complete")
;(require `auto-complete-config)
;(ac-config-default)
;(ac-config)
;(add-to-list `ac-dictionary-directories "~./.emacs.d/auto-complete/dict")

(add-to-list `load-path "~/.emacs.d/speedbar")
(require `sr-speedbar)
(global-set-key (kbd "<f12>") `sr-speedbar-toggle)

;;(require `yasnippet)
;;(yas-global-mode 1)

;;(add-to-list `load-path "~/.emacs.d/color-theme")
;;(require `color-theme)
;;(color-theme-initialize)
;;(setq color-theme-is-global t)


(load "~/.emacs.d/maximus")
(setq default-major-mode 'c++-mode)

(custom-set-variables 
'(column-number-mode t) ;;внизу будем видеть номер столбца
'(default-input-method "russian-computer");;ну а куда без этого
'(display-time-mode t) ;;ну.. в принципе не надо, но симпатично
'(tool-bar-mode nil)) ;;вот он тут точно не нужен
(setq inhibit-startup-message t) ;;не показывать сообщение при старте
(fset 'yes-or-no-p 'y-or-n-p) ;;не заставляйте меня печать yes целиком
(setq default-tab-width 4) ;;подифолту

(add-to-list `load-path "~/.emacs.d/php-mode")
(require 'php-mode)
;;(require 'php-electric) ;;режим autocompletion конструкций языка
(require 'msf-abbrev) ;;подгружаем "режим сокращений"
(setq-default abbrev-mode t) ;;ставим его подифолту
(setq save-abbrevs nil) ;;не надо записывать в дефолтный каталог наши сокращения
(setq msf-abbrev-root "~/.emacs.d/abb") ;;надо записывать их сюда
(global-set-key (kbd "C-c a") 'msf-abbrev-define-new-abbrev-this-mode) ;;(Ctrl-c a) для создания нового сокращения
;;(msf-abbrev-load) ;;пусть этот режим будет всегда :)


;(require 'nlinum)


;:(add-to-list 'package-archives
;:'("melpa" . "http://melpa.milkbox.net/packages/") t)
;:(set-cursor-color "#ff0000")
;;(require 'color-theme-cobalt)
;;(color-theme-)

(require 'package)
(add-to-list 'package-archives
			 '("melpa" . "http://melpa.org/packages/") t)
(when (< emacs-major-version 24)
  ;; For important compatibility libraries like cl-lib
  (add-to-list 'package-archives '("gnu" . "http://elpa.gnu.org/packages/")))
(package-initialize) ;; You might already have this line

;;(add-hook 'ruby-mode-hook 'projectile-mode)
(setq projectile-indexing-method 'native)
(projectile-global-mode)

