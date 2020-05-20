import Vue from 'vue'
import ApolloClient from 'apollo-boost'
import VueApollo from 'vue-apollo'

export const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: 'https://graphql.anilist.co'
})

export default new VueApollo({
    defaultClient: apolloClient,
})

Vue.use(VueApollo)
