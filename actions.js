import axios from 'axios'
import md5 from "blueimp-md5";

const base = 'http://localhost/task/phpsever/'//常量地址，base代表地址指向

const error = (err, commit) => {
    console.warn(err);
    commit('Notify', {
        message: err.message || '请求失败，请检查网络',
        type: 'error'
    })
}
import router from './../router'//node加载模块

export default {//export default命令用于指定模块的默认输出。显然，一个模块只能有一个默认输出，因此export default命令只能使用一次
    AdminLogin: ({//登入请求
        commit
    }, login) => {
        const md5Login = {
            account: login.account,
            password: md5(login.password)//md5加密
        }
        axios.post(base + 'login.php', md5Login).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                commit('InitAdmin', {
                    ...res.data.admin,
                    password: login.password
                });
                if (!router.currentRoute.path.includes('admin'))
                    router.push('/admin');
            } else {
                if (!router.currentRoute.path.includes('login'))
                    router.replace('/login');
                throw res.data;
            }
        }).catch(err => error(err, commit))
        axios.get(base + 'history.php', {
            params: {
                adminId: login.adminId
            }
        }).then(res => {
            if (res.data.status == 200)
                commit('HistoryList', res.data.history);
        })
    },
    AdminRegister: ({//注册请求
        commit
    }, register) => {
        const md5Register = {
            name: register.name,
            phone: register.phone,
            password: md5(register.password)
        }
        axios.post(base + 'register.php', md5Register).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                register._id = res.data._id;
                commit('InitAdmin', register);
                router.push('/admin');
            } else throw res.data;
        }).catch(err => error(err, commit))
    },
    AdminLogout: ({//退出登入
        commit
    }, adminId) => {
        axios.get(base + 'logout.php', adminId).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                commit('InitAdmin', {
                    _id: ''
                })
                router.replace('/login');
            } else throw res.data;
        }).catch(err => error(err, commit))
    },
    GetList: ({//获取表单
        commit
    }) => {
        axios.get(base + 'get.php').then(res => {
            if (res.data.status == 200)
                commit('InitList', res.data.lists)
            else throw res.data;
        }).catch(err => error(err, commit))
    },
    EditList: ({
        commit
    }, list) => {
        axios.post(base + 'edit.php', list).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                list._id = res.data._id
                commit('EditList', list);
                router.push('/admin');
            } else throw res.data;
        }).catch(err => error(err, commit))
    },
    MoveList: ({
        commit
    }, listId) => {
        axios.post(base + 'move.php', {
            listId
        }).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                commit('MoveList', listId);
            } else throw res.data;
        }).catch(err => error(err, commit))
    },
    AccountInfo: ({
        commit
    }, info) => {
        if (info.password) info = {
            _id: info._id,
            password: md5(info.password)
        }
        axios.post(base + 'info.php', info).then(res => {
            if (res.data.status == 200) {
                if (info.password) {
                    router.replace('/login');
                    commit('InitAdmin', {
                        _id: ''
                    })
                } else commit('AccountInfo', info);
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
            } else throw res.data;
        }).catch(err => error(err, commit))
    },
    StartList: ({
        commit
    }, listId) => {
        axios.post(base + 'start.php', {
            listId
        }).then(res => {
            if (res.data.status == 200) {
                commit('Notify', {
                    message: res.data.message,
                    type: 'success'
                })
                commit('StartList', listId)
            } else throw res.data;
        }).catch(err => error(err, commit))
    }
}