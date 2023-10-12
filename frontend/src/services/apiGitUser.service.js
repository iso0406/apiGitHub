import axios from 'axios'
export default class ApiGitService {

    static async getUser(user)
    {
        return axios.get(`getUser/${user}`);
    }

    static async getFollowers(user)
    {
        return axios.get(`getFollowers/${user}`);
    }
}