
	var mainMenu = [
		{ label: 'Reports',
			submenu: [
				{ label: 'Leads'    },
				{ label: 'Mails'    },
				{ label: 'Profiles' },
				{ label: 'Surveys'  },
				{ label: 'SecLog'   },
			]},
		{ label: 'Automation',
			submenu: [
				{ label: 'Flow'     },
				{ label: 'Dialog'   },
				{ label: 'Journey'  },
				{ label: 'Segments' },
				{ label: 'Personas' },
				{ label: 'Mailing'  },
				{ label: 'Drip'     },
				{ label: 'Nurture'  },
				{ label: 'Campaign' },
			]},
		{ label: 'Contents',
			submenu: [
				{ label: 'Blog Studio'      },
				{ label: 'Page Studio'      },
				{ label: 'Email Studio'     },
				{ label: 'Pdf Studio'       },
				{ label: 'Form Studio'      },
				{ label: 'Survey Studio'    },
				{ label: 'Assets'           },
				{ label: 'Downloads'        },
				{ label: 'Website Studio'   },
			    { label: 'Translate Studio' }
			]},
		{ label: 'Contacts',
			submenu: [
				{ label: 'People'               },
				{ label: 'E-Mails'              },
				{ label: 'Companies'            },
				{ label: 'Partners'             },
				{ label: 'Firms-Branches' },
				{ label: 'Website Members'      },
				{ label: 'Leads'                },
				{ label: 'Customers'            },
				{ label: 'Representatives'      }
			]},
		{ label: 'Statics',
			submenu: [
				{ label: 'Questions'},
				{ 
				  label     : 'Fields', 
				  route     : 'statics/fields/index',
				  load      : 'http://localhost:8001/load/fields',
				  component : 'fields'
				},{ 
				  label     : 'Tags', 
				  route     : 'statics/tags/index',
				  load      : 'http://localhost:8001/load/tags',
				  component : 'tags'
				},
				{ label: 'Vars'            },
				{ label: 'Layouts'         },
				{ label: 'Partials'        },
				{ label: 'Templates'       },
				{ label: 'Contacts Studio' },
			]},
		{ label: 'System',
			submenu: [
				{ label: 'Settings'  },
				{ label: 'Websites'  },
				{ label: 'Languages' },
				{ label: 'Modules'   },
			]},
		];