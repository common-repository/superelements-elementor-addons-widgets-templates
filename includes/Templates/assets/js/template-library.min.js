!function($, $elementor, $se) {

    window.liteTranslated = function (stringKey, templateArgs) {
        return elementorCommon.translate(stringKey, null, templateArgs, superElementorEditor.i18n)
    };

    var $app = {
        Views: {},
        Models: {},
        Collections: {},
        Behaviors: {},
        Layout: null,
        Manager: null
    };
    $app.Models.Template = Backbone.Model.extend({
        defaults: {
            template_id: 0,
            title: "",
            type: "",
            thumbnail: "",
            url: "",
            liveurl: "",
            favorite: "",
            tags: [],
            isPro: !1
        }
    }), 
    $app.Collections.Template = Backbone.Collection.extend({
        model: $app.Models.Template
    }), 
    $app.Behaviors.InsertTemplate = Marionette.Behavior.extend({
        ui: {
            insertButton: ".liteTemplateLibrary_insert-button"
        },
        events: {
            "click @ui.insertButton": "onInsertButtonClick"
        },
        onInsertButtonClick: function() {
            $se.library.insertTemplate({
                model: this.view.model
            })
        }
    }), 
    $app.Views.EmptyTemplateCollection = Marionette.ItemView.extend({
        id: "elementor-template-library-templates-empty",
        template: "#se-liteTemplateLibrary_empty",
        ui: {
            title: ".elementor-template-library-blank-title",
            message: ".elementor-template-library-blank-message"
        },
        modesStrings: {
            empty: {
                title: liteTranslated("templatesEmptyTitle"),
                message: liteTranslated("templatesEmptyMessage")
            },
            noResults: {
                title: liteTranslated("templatesNoResultsTitle"),
                message: liteTranslated("templatesNoResultsMessage")
            }
        },
        getCurrentMode: function() {
            return $se.library.getFilter("text") ? "noResults" : "empty"
        },
        onRender: function() {
            var getText = this.modesStrings[this.getCurrentMode()];
            this.ui.title.html(getText.title), this.ui.message.html(getText.message)
        }
    }), 
    $app.Views.Loading = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_loading",
        id: "liteTemplateLibrary_loading"
    }), 
    $app.Views.Logo = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-logo",
        className: "liteTemplateLibrary_header-logo",
        templateHelpers: function() {
            return {
                title: this.getOption("title")
            }
        }
    }), 
    $app.Views.BackButton = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-back",
        id: "elementor-template-library-header-preview-back",
        className: "liteTemplateLibrary_header-back",
        events: function() {
            return {
                click: "onClick"
            }
        },
        onClick: function() {
            $se.library.showTemplatesView()
        }
    }), 
    $app.Views.Menu = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-menu",
        id: "elementor-template-library-header-menu",
        className: "liteTemplateLibrary_header-menu",
        templateHelpers: function() {
            return $se.library.getTabs()
        },
        ui: {
            menuItem: ".elementor-template-library-menu-item"
        },
        events: {
            "click @ui.menuItem": "onMenuItemClick"
        },
        onMenuItemClick: function( tergetArgs ) {
            $se.library.setFilter("tags", ""), $se.library.setFilter("text", ""), $se.library.setFilter("type", tergetArgs.currentTarget.dataset.tab, !0), $se.library.showTemplatesView()
        }
    }), 
    $app.Views.ResponsiveMenu = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-menu-responsive",
        id: "elementor-template-library-header-menu-responsive",
        className: "liteTemplateLibrary_header-menu-responsive",
        ui: {
            items: "> .elementor-component-tab"
        },
        events: {
            "click @ui.items": "onTabItemClick"
        },
        onTabItemClick: function(dataTarget) {
            var currentTerget = $(dataTarget.currentTarget),
                getTab = currentTerget.data("tab");
            $se.library.channels.tabs.trigger("change:device", getTab, currentTerget)
        }
    }), 
    $app.Views.Actions = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-actions",
        id: "elementor-template-library-header-actions",
        ui: {
            sync: "#liteTemplateLibrary_header-sync i"
        },
        events: {
            "click @ui.sync": "onSyncClick"
        },
        onSyncClick: function() {
            var superElements = this;
            superElements.ui.sync.addClass("eicon-animation-spin"), $se.library.requestLibraryData({
                onUpdate: function() {
                    superElements.ui.sync.removeClass("eicon-animation-spin"), $se.library.updateBlocksView()
                },
                forceUpdate: !0,
                forceSync: !0
            })
        }
    }), 
    $app.Views.InsertWrapper = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_header-insert",
        id: "elementor-template-library-header-preview",
        behaviors: {
            insertTemplate: {
                behaviorClass: $app.Behaviors.InsertTemplate
            }
        }
    }), 
    $app.Views.Preview = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_preview",
        className: "liteTemplateLibrary_preview",
        ui: function() {
            return {
                img: "> img"
            }
        },
        onRender: function() {
            this.ui.img.attr("src", this.getOption("url")).hide();
            var thisElement = this,
            renderData = (new $app.Views.Loading).render();
            this.$el.append(renderData.el), this.ui.img.on("load", function() {
                thisElement.$el.find("#liteTemplateLibrary_loading").remove(), thisElement.ui.img.show()
            })
        }
    }), 
    $app.Views.TemplateCollection = Marionette.CompositeView.extend({
        template: "#se-liteTemplateLibrary_templates",
        id: "liteTemplateLibrary_templates",
        className: function() {
            return "liteTemplateLibrary_templates liteTemplateLibrary_templates--" + $se.library.getFilter("type")
        },
        childViewContainer: "#liteTemplateLibrary_templates-list",
        emptyView: function() {
            return new $app.Views.EmptyTemplateCollection
        },
        ui: {
            templatesWindow: ".liteTemplateLibrary_templates-window",
            textFilter: "#liteTemplateLibrary_search",
            tagsFilter: "#liteTemplateLibrary_filter-tags",
            filterBar: "#liteTemplateLibrary_toolbar-filter",
            counter: "#liteTemplateLibrary_toolbar-counter"
        },
        events: {
            "input @ui.textFilter": "onTextFilterInput",
            "click @ui.tagsFilter li": "onTagsFilterClick"
        },
        getChildView: function(element) {
            return $app.Views.Template
        },
        initialize: function() {
            this.listenTo($se.library.channels.templates, "filter:change", this._renderChildren)
        },
        filter: function(data) {
            var seFilterTerms = $se.library.getFilterTerms(),
                 filterBool = !0;
            return _.each(seFilterTerms, function(item, index) {
                var getSeFilter = $se.library.getFilter(index);
                if (getSeFilter && item.callback) {
                    var seCallBack = item.callback.call(data, getSeFilter);
                    return seCallBack || (filterBool = !1), seCallBack
                }
            }), filterBool
        },
        setMasonrySkin: function() {
            
            if ('section' === $se.library.getFilter("type")) {
                var contentGet = new elementorModules.utils.Masonry({
                    container: this.$childViewContainer,
                    items: this.$childViewContainer.children()
                });
                this.$childViewContainer.imagesLoaded(contentGet.run.bind(contentGet))
            }
        },
        onRenderCollection: function() {
            this.setMasonrySkin(), this.updatePerfectScrollbar(), this.setTemplatesFoundText()
        },
        setTemplatesFoundText: function() {
            var getSeType = $se.library.getFilter("type"),
                getLength = this.children.length;
            text = "<strong>" + getLength + "</strong>", text += "section" === getSeType ? " block" : " " + getSeType, getLength > 1 && (text += "seGetTag"), text += " found", this.ui.counter.html(text)
        },
        onTextFilterInput: function() {
            var seElement = this;
            _.defer(function() {
                $se.library.setFilter("text", seElement.ui.textFilter.val())
            })
        },
        onTagsFilterClick: function(data) {
            var seGetCurrent = $(data.currentTarget),
                seGetTag = seGetCurrent.data("tag");
            $se.library.setFilter("tags", seGetTag), seGetCurrent.addClass("active").siblings().removeClass("active"), seGetTag = seGetTag ? $se.library.getTags()[seGetTag] : "Filter", this.ui.filterBar.find(".liteTemplateLibrary_filter-btn").html(seGetTag + ' <i class="eicon-caret-down"></i>')
        },
        updatePerfectScrollbar: function() {
            this.perfectScrollbar || (this.perfectScrollbar = new PerfectScrollbar(this.ui.templatesWindow[0], {
                suppressScrollX: !0
            })), this.perfectScrollbar.isRtl = !1, this.perfectScrollbar.update()
        },
        setTagsFilterHover: function() {
            var seElementThis = this;
            seElementThis.ui.filterBar.hoverIntent(function() {
                seElementThis.ui.tagsFilter.addClass("liteTemplateLibrary_filter-show"), seElementThis.ui.filterBar.find(".liteTemplateLibrary_filter-btn i").addClass("eicon-caret-down").removeClass("eicon-caret-right")
            }, function() {
                seElementThis.ui.tagsFilter.removeClass("liteTemplateLibrary_filter-show");
                seElementThis.ui.tagsFilter.addClass("liteTemplateLibrary_filter-hide"), seElementThis.ui.filterBar.find(".liteTemplateLibrary_filter-btn i").addClass("eicon-caret-right").removeClass("eicon-caret-down")
            }, {
                sensitivity: 50,
                interval: 150,
                timeout: 100
            })
        },
        onRender: function() {
            this.setTagsFilterHover(), this.updatePerfectScrollbar()
        }
    }), 
    $app.Views.Template = Marionette.ItemView.extend({
        template: "#se-liteTemplateLibrary_template",
        className: "liteTemplateLibrary_template",
        ui: {
            previewButton: ".liteTemplateLibrary_preview-button, .liteTemplateLibrary_template-preview"
        },
        events: {
            "click @ui.previewButton": "onPreviewButtonClick"
        },
        behaviors: {
            insertTemplate: {
                behaviorClass: $app.Behaviors.InsertTemplate
            }
        },
        onPreviewButtonClick: function() {
            $se.library.showPreviewView(this.model)
        }
    }), 
    $app.Modal = elementorModules.common.views.modal.Layout.extend({
        getModalOptions: function() {
            return {
                id: "liteTemplateLibrary_modal",
                hide: {
                    onOutsideClick: !1,
                    onEscKeyPress: !0,
                    onBackgroundClick: !1
                }
            }
        },
        getTemplateActionButton: function(data) {
            var seGetProBtn = data.isPro && !superElementorEditor.hasPro ? "pro-button" : "insert-button";
            return viewId = "#se-liteTemplateLibrary_" + seGetProBtn, template = Marionette.TemplateCache.get(viewId), Marionette.Renderer.render(template)
        },
        showLogo: function(logo) {
            this.getHeaderView().logoArea.show(new $app.Views.Logo(logo))
        },
        showDefaultHeader: function() {
            this.showLogo({
                title: "Super Templates"
            });
            var seHeaderView = this.getHeaderView();
            seHeaderView.tools.show(new $app.Views.Actions), seHeaderView.menuArea.show(new $app.Views.Menu)
        },
        showPreviewView: function(data) {
            var seHeaderPreview = this.getHeaderView();
            seHeaderPreview.menuArea.show(new $app.Views.ResponsiveMenu), seHeaderPreview.logoArea.show(new $app.Views.BackButton), seHeaderPreview.tools.show(new $app.Views.InsertWrapper({
                model: data
            })), this.modalContent.show(new $app.Views.Preview({
                url: data.get("url")
            }))
        },
        showTemplatesView: function(view) {
            this.showDefaultHeader(), this.modalContent.show(new $app.Views.TemplateCollection({
                collection: view
            }))
        }
    }), 

    $app.Manager = function() {
        
        function addButton() {
            var $top = $(this).closest(".elementor-top-section"),
                $seID = $top.data("id"),
                $seContentget = $elementor.documents.getCurrent().container.children,
                $sl = $top.prev(".elementor-add-section");
                $seContentget && _.each($seContentget, function(seItem, seIndex) {
                $seID === seItem.id && ($this.atIndex = seIndex)
            }), $sl.find(".se_templates_add_button").length || $sl.find(SE_FIND_SELECTOR).before($sePpenLibraryButton)
        }

        function initAddButton($element) {
            var $seSelector = $element.find(SE_FIND_SELECTOR);
            $seSelector.length && !$element.find(".se_templates_add_button").length && $seSelector.before($sePpenLibraryButton), $element.on("click.onAddElement", ".elementor-editor-section-settings .elementor-editor-element-add", addButton)
        }

        function onChanges($data, $element) {
            $element.addClass("elementor-active").siblings().removeClass("elementor-active");
            var seDevice = $dlResponsiveMap[$data] || $dlResponsiveMap.desktop;
            $(".liteTemplateLibrary_preview").css("width", seDevice)
        }

        function onEditorLoaded() {
            var $el = window.elementor.$previewContents,
                $t = setInterval(function() {
                    initAddButton($el), $el.find(".elementor-add-new-section").length > 0 && clearInterval($t)
                }, 120);
                $el.on("click.onAddTemplateButton", ".se_templates_add_button", $this.showModal.bind($this)), this.channels.tabs.on("change:device", onChanges)
        }

        var seModal, seGetTag, seFilterType, seUpdateBlockView, seErrorDialog, $this = this;
        
        SE_FIND_SELECTOR = ".elementor-add-new-section .elementor-add-section-drag-title", 
        $sePpenLibraryButton = '<div class="elementor-add-section-area-button se_templates_add_button"> <img src="'+superElementorEditor.templateLogo+'" /> </div>', 
        $dlResponsiveMap = {
            desktop: "100%",
            tab: "768px",
            mobile: "360px"
        }, 
        this.atIndex = -1, 
        this.channels = {
            tabs: Backbone.Radio.channel("tabs"),
            templates: Backbone.Radio.channel("templates")
        }, 
        this.updateBlocksView = function() {
            $this.setFilter("tags", "", !0), $this.setFilter("text", "", !0), $this.getModal().showTemplatesView(seUpdateBlockView)
        }, 
        this.setFilter = function(name, value, silent) {
            
            $this.channels.templates.reply("filter:" + name, value), silent || $this.channels.templates.trigger("filter:change")
        }, 
        this.getFilter = function(name) {
            return $this.channels.templates.request("filter:" + name)
        }, 
        this.getFilterTerms = function() {
            return {
                tags: {
                    callback: function(e) {
                        return _.any(this.get("tags"), function(t) {
                            return t.indexOf(e) >= 0
                        })
                    }
                },
                text: {
                    callback: function(e) {
                        return e = e.toLowerCase(), this.get("title").toLowerCase().indexOf(e) >= 0 || _.any(this.get("type_tags"), function(t) {
                            return i.indexOf(e) >= 0
                        })
                    }
                },
                type: {
                    callback: function(e) {
                        return this.get("type") === e
                    }
                }
            }
        }, 
        this.showModal = function() {
            $this.getModal().showModal(), $this.showTemplatesView()
        }, 
        this.closeModal = function() {
            this.getModal().hideModal()
        }, 
        this.getModal = function() {
            return seModal || (seModal = new $app.Modal), seModal
        }, 
        this.init = function() {
            $this.setFilter("type", superElementorEditor.default_tab, !0), $elementor.on("preview:loaded", onEditorLoaded.bind(this))
        }, 
        this.getTabs = function() {
            var e = this.getFilter("type");
            return tabs = JSON.parse(superElementorEditor.tab_style)
            , _.each(tabs, function(t, i) {
                e === i && (tabs[e].active = !0)
            }), {
                tabs: tabs
            }
        }, 
        this.getTags = function() {
            return seGetTag
        }, 
        this.getTypeTags = function() {
            var filterType = $this.getFilter("type");
            return seFilterType[filterType]
        }, 
        this.showTemplatesView = function() {
            $this.setFilter("tags", "", !0), $this.setFilter("text", "", !0), seUpdateBlockView ? $this.getModal().showTemplatesView(seUpdateBlockView) : $this.loadTemplates(function() {
                $this.getModal().showTemplatesView(seUpdateBlockView)
            })
        }, 
        this.showPreviewView = function(name) {
            $this.getModal().showPreviewView(name)
        }, 
        this.loadTemplates = function(name) {
            $this.requestLibraryData({
                onBeforeUpdate: $this.getModal().showLoadingView.bind($this.getModal()),
                onUpdate: function() {
                    $this.getModal().hideLoadingView(), name && name()
                }
            })
        }, 
        this.requestLibraryData = function(options) {
            if (seUpdateBlockView && !options.forceUpdate) return void(options.onUpdate && options.onUpdate());
            options.onBeforeUpdate && options.onBeforeUpdate();
            var returnAjax = {
                data: {},
                success: function($response) {
                    seUpdateBlockView = new $app.Collections.Template($response.templates), $response.tags && (seGetTag = $response.tags), $response.type_tags && (seFilterType = $response.type_tags), options.onUpdate && options.onUpdate()
                }
            };
            options.forceSync && (t.data.sync = !0), elementorCommon.ajax.addRequest("get_se_addon_library_data", returnAjax)
        }, 
        this.requestTemplateData = function(tId, seRequest) {
            var tData = {
                unique_id: tId,
                data: {
                    edit_mode: !0,
                    display: !0,
                    template_id: tId
                }
            };
            seRequest && jQuery.extend(!0, tData, seRequest), elementorCommon.ajax.addRequest("get_dladdon_template_data", tData)
        }, 
        this.insertTemplate = function(html) {
            var seModel = html.model,
                seThis = this;
                seThis.getModal().showLoadingView(), seThis.requestTemplateData(seModel.get("template_id"), {
                success: function(html) {
                    seThis.getModal().hideLoadingView(), seThis.getModal().hideModal();
                    var seIndex = {}; - 1 !== seThis.atIndex && (seIndex.at = seThis.atIndex), $e.run("document/elements/import", {
                        model: seModel,
                        data: html,
                        options: seIndex
                    }), seThis.atIndex = -1
                },
                error: function(html) {
                    seThis.showErrorDialog(html)
                },
                complete: function(html) {
                    seThis.getModal().hideLoadingView(), window.elementor.$previewContents.find(".elementor-add-section .elementor-add-section-close").click()
                }
            })
        }, 
        this.showErrorDialog = function (errorMessage) {
            if ('object' === (0, _typeof2.default)(errorMessage)) {
              var message = '';
              _.each(errorMessage, function (error) {
                if (!(error !== null && error !== void 0 && error.message)) {
                  return;
                }
                message += '<div>' + error.message + '.</div>';
              });
              errorMessage = message;
            } else if (errorMessage) {
              errorMessage += '.';
            }
            if (errorMessage) {
              errorMessage = __('The following error(s) occurred while processing the request:', 'superelements-elementor-addons-widgets-templates') + '<div id="elementor-template-library-error-info">' + errorMessage + '</div>';
            } else {
              errorMessage = __('Please try again.', 'superelements-elementor-addons-widgets-templates');
            }
            self.getErrorDialog().setMessage(errorMessage).show();
          }, 
        this.getErrorDialog = function() {
            return seErrorDialog || (seErrorDialog = elementorCommon.dialogsManager.createWidget("alert", {
                id: "elementor-template-library-error-dialog",
                headerMessage: "An error occurred"
            })), seErrorDialog
        }
    }, 
    $se.library = new $app.Manager,
    $se.library.init(), 
    window.se = $se

}(jQuery, window.elementor, window.se || {});