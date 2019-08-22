<template>
    <div>
        <h1 class="section-heading" v-bind:class="{'hidden' : !completedTextHidden}">
            Provide Details
            <div class="progress-bar"><span id="tracker" class="progress-tracker" style="width:0%"></span></div>
        </h1>
        <div>
            <div class="two-info-questions-1 question-section" v-bind:class="{'hidden' : questionsOneHidden}">
                <div class="question-wrapper">
                    <label for="companionOne" class="question-label">Companion One First Name</label>
                    <input v-model="companionOne" id="companionOne" class="question-input"/>
                </div>
                <div class="question-wrapper">
                    <label for="companionTwo" class="question-label">Companion Two First Name</label>
                    <input v-model="companionTwo" id="companionTwo" class="question-input"/>
                </div>
                <div class="question-wrapper">
                    <label for="presMember" class="question-label">Your Name</label>
                    <input v-model="presMember" id="presMember" class="question-input" v-on:keyup.enter="showNextQuestion('questionsOneHidden', 'questionsTwoHidden', 'msOneFirstName')"/>
                </div>
                <button @click="showNextQuestion('questionsOneHidden', 'questionsTwoHidden', 'msOneFirstName')" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-2 question-section" v-bind:class="{'hidden' : questionsTwoHidden}">
                <div class="question-wrapper">
                    <label for="msOneFirstName" class="question-label">First Sister Assigned First Name</label>
                    <input v-model="msOneFirstName" id="msOneFirstName" class="question-input" />
                </div>
                <div class="question-wrapper">
                    <label for="msOneLastName" class="question-label">First Sister Assigned Last Name</label>
                    <input v-model="msOneLastName" id="msOneLastName" class="question-input" v-on:keyup.enter="showNextQuestionIfnoInfoForFirst('questionsTwoHidden', 'questionsThreeHidden', 'msOneMinisteringType', msOneLastName, msOneFirstName)"/>
                </div>
                <button @click="showNextQuestionIfnoInfoForFirst('questionsTwoHidden', 'questionsThreeHidden', 'msOneMinisteringType', msOneLastName, msOneFirstName)" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-3 question-section" v-bind:class="{'hidden' : questionsThreeHidden}">
                <div class="question-wrapper">
                    <label for="msOneMinisteringType" class="question-label">How {{msOneFirstName}} likes to be ministered to:</label>
                    <input v-model="msOneMinisteringType" id="msOneMinisteringType" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msOneAvailability" class="question-label">{{msOneFirstName}}'s Availability</label>
                    <input v-model="msOneAvailability" id="msOneAvailability" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msOneTreat" class="question-label">{{msOneFirstName}}'s Favorite Treat</label>
                    <input v-model="msOneTreat" id="msOneTreat" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msOneHobbies" class="question-label">{{msOneFirstName}}'s Hobbies</label>
                    <input v-model="msOneHobbies" id="msOneHobbies" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msOneNumber" class="question-label">{{msOneFirstName}}'s Phone #</label>
                    <input v-model="msOneNumber" id="msOneNumber" class="question-input" v-on:keyup.enter="showNextQuestion('questionsThreeHidden', 'questionsFourHidden', 'msTwoFirstName')">
                </div>
                <button @click="showNextQuestion('questionsThreeHidden', 'questionsFourHidden', 'msTwoFirstName')" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-4 question-section" v-bind:class="{'hidden' : questionsFourHidden}">
                <div class="question-wrapper">
                    <label for="msTwoFirstName" class="question-label">Second Sister Assigned First Name</label>
                    <input v-model="msTwoFirstName" id="msTwoFirstName" class="question-input"/>
                </div>
                <div class="question-wrapper">
                    <label for="msTwoLastName" class="question-label">Second Sister Assigned Last Name</label>
                    <input v-model="msTwoLastName" id="msTwoLastName" class="question-input" v-on:keyup.enter="showNextQuestionIfnoInfoForSecond('questionsFourHidden', 'questionsFiveHidden', 'msTwoMinisteringType', msTwoLastName, msTwoFirstName)"/>
                </div>

                <button @click="showNextQuestionIfnoInfoForSecond('questionsFourHidden', 'questionsFiveHidden', 'msTwoMinisteringType', msTwoLastName, msTwoFirstName)" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-5 question-section" v-bind:class="{'hidden' : questionsFiveHidden}" >
                <div class="question-wrapper">
                    <label for="msTwoMinisteringType" class="question-label">How {{msTwoFirstName}} likes to be ministered to:</label>
                    <input v-model="msTwoMinisteringType" id="msTwoMinisteringType" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msTwoAvailability" class="question-label">{{msTwoFirstName}}'s Availability</label>
                    <input v-model="msTwoAvailability" id="msTwoAvailability" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msTwoTreat" class="question-label">{{msTwoFirstName}}'s Favorite Treat</label>
                    <input v-model="msTwoTreat" id="msTwoTreat" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msTwoHobbies" class="question-label">{{msTwoFirstName}}'s Hobbies</label>
                    <input v-model="msTwoHobbies" id="msTwoHobbies" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msTwoNumber" class="question-label">{{msTwoFirstName}}'s Phone #</label>
                    <input v-model="msTwoNumber" id="msTwoNumber" class="question-input" v-on:keyup.enter="finishQuestions('questionsFiveHidden'); progressBar()">
                </div>

                <button @click="showNextQuestion('questionsFiveHidden', 'questionsSixHidden', 'msThreeFirstName'); progressBar()" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-6 question-section" v-bind:class="{'hidden' : questionsSixHidden}">
                <div class="question-wrapper">
                    <label for="msThreeFirstName" class="question-label">Third Sister Assigned First Name</label>
                    <input v-model="msThreeFirstName" id="msThreeFirstName" class="question-input"/>
                </div>
                <div class="question-wrapper">
                    <label for="msThreeLastName" class="question-label">Third Sister Assigned Last Name</label>
                    <input v-model="msThreeLastName" id="msThreeLastName" class="question-input" v-on:keyup.enter="showNextQuestionIfnoInfoForThird('questionsSixHidden', 'questionsSevenHidden', 'msThreeMinisteringType', msThreeLastName, msThreeFirstName)"/>
                </div>

                <button @click="showNextQuestionIfnoInfoForThird('questionsSixHidden', 'questionsSevenHidden', 'msThreeMinisteringType', msThreeLastName, msThreeFirstName)" class="next-question">&#8594;</button>
            </div>
            <div class="two-info-questions-7 question-section" v-bind:class="{'hidden' : questionsSevenHidden}">
                <div class="question-wrapper">
                    <label for="msThreeMinisteringType" class="question-label">How {{msThreeFirstName}} likes to be ministered to:</label>
                    <input v-model="msThreeMinisteringType" id="msThreeMinisteringType" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msThreeAvailability" class="question-label">{{msThreeFirstName}}'s Availability</label>
                    <input v-model="msThreeAvailability" id="msThreeAvailability" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msThreeTreat" class="question-label">{{msThreeFirstName}}'s Favorite Treat</label>
                    <input v-model="msThreeTreat" id="msThreeTreat" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msThreeHobbies" class="question-label">{{msThreeFirstName}}'s Hobbies</label>
                    <input v-model="msThreeHobbies" id="msThreeHobbies" class="question-input">
                </div>
                <div class="question-wrapper">
                    <label for="msThreeNumber" class="question-label">{{msThreeFirstName}}'s Phone #</label>
                    <input v-model="msThreeNumber" id="msThreeNumber" class="question-input" v-on:keyup.enter="finishQuestions('questionsSevenHidden'); progressBar()">
                </div>

                <button @click="finishQuestions('questionsSevenHidden'); progressBar()" class="next-question">&#8594;</button>
            </div>

        </div>

        <div v-bind:class="{'hidden' : completedTextHidden}">
            <h1 class="section-heading">Copy & Paste</h1>
            <p class="text-to-review">Hello {{companionOne}} & {{companionTwo}}!</p>
            <p class="text-to-review">This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.</p>
            <p class="text-to-review"  v-bind:class="{'hidden' : noInfoForFirst && noInfoForSecond && noInfoForThird}">Here's some info about Sister {{msOneLastName}}, Sister {{msTwoLastName}} & Sister {{msThreeLastName}} based on the survey we handed out.</p>

            <div class="text-to-review-wrapper" v-bind:class="{'hidden' : noInfoForFirst}">
                <p class="text-to-review">What {{msOneFirstName}} would like from you: <span class="text-answers">{{msOneMinisteringType}}</span></p>
                <p class="text-to-review">{{msOneFirstName}}'s Availability: <span class="text-answers">{{msOneAvailability}}</span></p>
                <p class="text-to-review">{{msOneFirstName}}'s Favorite Treat(s): <span class="text-answers">{{msOneTreat}}</span></p>
                <p class="text-to-review">{{msOneFirstName}}'s Hobbies: <span class="text-answers">{{msOneHobbies}}</span></p>
            </div>
            <div class="text-to-review-wrapper hidden" v-bind:class="{'visible' : noInfoForFirst, 'hidden-after-visible' : noInfoForFirst && noInfoForSecond}">
                <p class="text-to-review">{{msOneFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.</p>
            </div>
            <div class="text-to-review-wrapper" v-bind:class="{'hidden' : noInfoForSecond}">
                <p class="text-to-review">What {{msTwoFirstName}} would like from you: <span class="text-answers">{{msTwoMinisteringType}}</span></p>
                <p class="text-to-review">{{msTwoFirstName}}'s Availability: <span class="text-answers">{{msTwoAvailability}}</span></p>
                <p class="text-to-review">{{msTwoFirstName}}'s Favorite Treat(s): <span class="text-answers">{{msTwoTreat}}</span></p>
                <p class="text-to-review">{{msTwoFirstName}}'s Hobbies: <span class="text-answers">{{msTwoHobbies}}</span></p>
            </div>
            <div class="text-to-review-wrapper hidden" v-bind:class="{'visible' : noInfoForSecond, 'hidden-after-visible' : noInfoForFirst && noInfoForSecond}">
                <p class="text-to-review">{{msTwoFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.</p>
            </div>
            <div class="text-to-review-wrapper" v-bind:class="{'hidden' : noInfoForThird}">
                <p class="text-to-review">What {{msThreeFirstName}} would like from you: <span class="text-answers">{{msThreeMinisteringType}}</span></p>
                <p class="text-to-review">{{msThreeFirstName}}'s Availability: <span class="text-answers">{{msThreeAvailability}}</span></p>
                <p class="text-to-review">{{msThreeFirstName}}'s Favorite Treat(s): <span class="text-answers">{{msThreeTreat}}</span></p>
                <p class="text-to-review">{{msThreeFirstName}}'s Hobbies: <span class="text-answers">{{msThreeHobbies}}</span></p>
            </div>
            <div class="text-to-review-wrapper hidden" v-bind:class="{'visible' : noInfoForThird, 'hidden-after-visible' : noInfoForFirst && noInfoForSecond && noInfoForThird}">
                <p class="text-to-review">{{msThreeFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.</p>
            </div>
            <div class="text-to-review-wrapper hidden" v-bind:class="{'visible' : noInfoForFirst && noInfoForSecond && noInfoForThird}">
                <p class="text-to-review">{{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}} haven't filled out a survey yet, but I'm sure you will learn more about them as you reach out.</p>
            </div>
            <p class="text-to-review">We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!</p>
            <div class="text-to-review">
                <p>{{msOneFirstName}}'s number: <span class="text-answers">{{msOneNumber}}</span></p>
                <p>{{msTwoFirstName}}'s number: <span class="text-answers">{{msTwoNumber}}</span></p>
                <p>{{msThreeFirstName}}'s number: <span class="text-answers">{{msThreeNumber}}</span></p>
            </div>
            <div>
<textarea id="text-info-for-all" class="text-to-copy have-info-for-all">
Hello {{companionOne}} & {{companionTwo}}!

This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.

Here's some info about Sister {{msOneLastName}}, Sister {{msTwoLastName}} & Sister {{msThreeLastName}} based on the survey we handed out:

What {{msOneFirstName}} would like from you: {{msOneMinisteringType}}
{{msOneFirstName}}'s Availability: {{msOneAvailability}}
{{msOneFirstName}}'s Favorite Treat(s): {{msOneTreat}}
{{msOneFirstName}}'s Hobbies: {{msOneHobbies}}

What {{msTwoFirstName}} would like from you: {{msTwoMinisteringType}}
{{msTwoFirstName}}'s Availability: {{msTwoAvailability}}
{{msTwoFirstName}}'s Favorite Treat(s): {{msTwoTreat}}
{{msTwoFirstName}}'s Hobbies: {{msTwoHobbies}}

What {{msThreeFirstName}} would like from you: {{msThreeMinisteringType}}
{{msThreeFirstName}}'s Availability: {{msThreeAvailability}}
{{msThreeFirstName}}'s Favorite Treat(s): {{msThreeTreat}}
{{msThreeFirstName}}'s Hobbies: {{msThreeHobbies}}

We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!

{{msOneFirstName}}'s number: {{msOneNumber}}

{{msTwoFirstName}}'s number: {{msTwoNumber}}

{{msThreeFirstName}}'s number: {{msThreeNumber}}
</textarea>

                <textarea id="no-info-for-first" class="text-to-copy no-info-for-first">
Hello {{companionOne}} & {{companionTwo}}!

This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.

Here's some info about Sister {{msTwoLastName}} & Sister {{msThreeLastName}} based on the survey we handed out:

{{msOneFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.

What {{msTwoFirstName}} would like from you: {{msTwoMinisteringType}}
{{msTwoFirstName}}'s Availability: {{msTwoAvailability}}
{{msTwoFirstName}}'s Favorite Treat(s): {{msTwoTreat}}
{{msTwoFirstName}}'s Hobbies: {{msTwoHobbies}}

What {{msThreeFirstName}} would like from you: {{msThreeMinisteringType}}
{{msThreeFirstName}}'s Availability: {{msThreeAvailability}}
{{msThreeFirstName}}'s Favorite Treat(s): {{msThreeTreat}}
{{msThreeFirstName}}'s Hobbies: {{msThreeHobbies}}

We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!

{{msOneFirstName}}'s number: {{msOneNumber}}

{{msTwoFirstName}}'s number: {{msTwoNumber}}

{{msThreeFirstName}}'s number: {{msThreeNumber}}
</textarea>

                <textarea id="no-info-for-second" class="text-to-copy no-info-for-second">
Hello {{companionOne}} & {{companionTwo}}!

This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.

Here's some info about Sister {{msOneLastName}} & Sister {{msThreeLastName}} based on the survey we handed out:

What {{msOneFirstName}} would like from you: {{msOneMinisteringType}}
{{msOneFirstName}}'s Availability: {{msOneAvailability}}
{{msOneFirstName}}'s Favorite Treat(s): {{msOneTreat}}
{{msOneFirstName}}'s Hobbies: {{msOneHobbies}}

{{msTwoFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.

What {{msThreeFirstName}} would like from you: {{msThreeMinisteringType}}
{{msThreeFirstName}}'s Availability: {{msThreeAvailability}}
{{msThreeFirstName}}'s Favorite Treat(s): {{msThreeTreat}}
{{msThreeFirstName}}'s Hobbies: {{msThreeHobbies}}

We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!

{{msOneFirstName}}'s number: {{msOneNumber}}

{{msTwoFirstName}}'s number: {{msTwoNumber}}

{{msThreeFirstName}}'s number: {{msThreeNumber}}
</textarea>

                <textarea id="no-info-for-third" class="text-to-copy no-info-for-third">
Hello {{companionOne}} & {{companionTwo}}!

This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.

Here's some info about Sister {{msOneLastName}} & Sister {{msTwoLastName}} based on the survey we handed out:

What {{msOneFirstName}} would like from you: {{msOneMinisteringType}}
{{msOneFirstName}}'s Availability: {{msOneAvailability}}
{{msOneFirstName}}'s Favorite Treat(s): {{msOneTreat}}
{{msOneFirstName}}'s Hobbies: {{msOneHobbies}}

What {{msTwoFirstName}} would like from you: {{msTwoMinisteringType}}
{{msTwoFirstName}}'s Availability: {{msTwoAvailability}}
{{msTwoFirstName}}'s Favorite Treat(s): {{msTwoTreat}}
{{msTwoFirstName}}'s Hobbies: {{msTwoHobbies}}

{{msThreeFirstName}} hasn't filled out a survey yet, but I'm sure you will learn more about her as you reach out.

We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!

{{msOneFirstName}}'s number: {{msOneNumber}}

{{msTwoFirstName}}'s number: {{msTwoNumber}}

{{msThreeFirstName}}'s number: {{msThreeNumber}}
</textarea>

                <textarea id="text-info-for-none" class="text-to-copy have-info-for-none">
Hello {{companionOne}} & {{companionTwo}}!

This is {{presMember}} from the ward. :) We as a Relief Society appreciate your willingness to minister to a few sisters in our ward. Their names are {{msOneFirstName}} {{msOneLastName}}, {{msTwoFirstName}} {{msTwoLastName}} & {{msThreeFirstName}} {{msThreeLastName}}. We encourage you to get to know each other as you will be companions, and to get to know these sisters so you can reach out in love to fulfill their needs. Let me know if there is anything I can do to assist you as I am here to offer you support. This is a new assignment so you'll probably need to sync your LDS tools app to see it updated there.

{{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}} haven't filled out a survey yet, but I'm sure you will learn more about them as you reach out.

We love you Sisters and know that you will be of great help to {{msOneFirstName}}, {{msTwoFirstName}} & {{msThreeFirstName}}!

{{msOneFirstName}}'s number: {{msOneNumber}}

{{msTwoFirstName}}'s number: {{msTwoNumber}}

{{msThreeFirstName}}'s number: {{msThreeNumber}}
</textarea>

            </div>
            <button @click="copyText()" class="copy-button" id="copy-button">Copy Text</button>
            <button v-on:click="reset(); $emit('start-again')" class="start-again-button">Start Again</button>
        </div>


    </div>
</template>

<script>

    export default {
        name: 'TwoCompanionsThreeSisters',
        props: {
            msg: String,
            sistersData: Array
        },

        mounted() {
            this.focusInput('companionOne');
        },

        data() {
            return {
                companionOne : '',
                companionTwo : '',
                presMember : '',
                msOneFirstName : '',
                msOneLastName : '',
                msOneMinisteringType : '',
                msOneAvailability : '',
                msOneTreat : '',
                msOneHobbies : '',
                msOneNumber : '',
                msTwoFirstName : '',
                msTwoLastName : '',
                msTwoMinisteringType : '',
                msTwoAvailability : '',
                msTwoTreat : '',
                msTwoHobbies : '',
                msTwoNumber : '',
                msThreeFirstName : '',
                msThreeLastName : '',
                msThreeMinisteringType : '',
                msThreeAvailability : '',
                msThreeTreat : '',
                msThreeHobbies : '',
                msThreeNumber : '',
                text : '',
                questionsOneHidden : false,
                questionsTwoHidden : true,
                questionsThreeHidden : true,
                questionsFourHidden : true,
                questionsFiveHidden : true,
                questionsSixHidden : true,
                questionsSevenHidden : true,
                completedTextHidden : true,
                noInfoForFirst : true,
                noInfoForSecond : true,
                noInfoForThird : true,
                currentSisterData : {}
            }

        },
        filters: {
            capitalize: function (value) {
                if (!value) return '';
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        },
        watch: {
            companionOne(val) {
                this.companionOne = this.$options.filters.capitalize(val);
            },
            companionTwo(val) {
                this.companionTwo = this.$options.filters.capitalize(val);
            },
            presMember(val) {
                this.presMember = this.$options.filters.capitalize(val);
            },
            msOneFirstName(val) {
                this.msOneFirstName = this.$options.filters.capitalize(val);
            },
            msOneLastName(val) {
                this.msOneLastName = this.$options.filters.capitalize(val);
            },
            msTwoFirstName(val) {
                this.msTwoFirstName = this.$options.filters.capitalize(val);
            },
            msTwoLastName(val) {
                this.msTwoLastName = this.$options.filters.capitalize(val);
            },
            msThreeFirstName(val) {
                this.msThreeFirstName = this.$options.filters.capitalize(val);
            },
            msThreeLastName(val) {
                this.msThreeLastName = this.$options.filters.capitalize(val);
            }
        },

        methods : {

            copyText() {
                let textToCopy = document.getElementById(this.getCopyId());
                textToCopy.focus();
                textToCopy.select();
                textToCopy.setSelectionRange(0,9999);
                document.execCommand("copy");
                document.getElementById('copy-button').textContent= "Copied!";
            },

            getCopyId() {
                if (!this.noInfoForFirst && !this.noInfoForSecond && !this.noInfoForThird) {
                    return 'text-info-for-all';
                }

                if (this.noInfoForFirst && this.noInfoForSecond && this.noInfoForThird) {
                    return 'text-info-for-none';
                }

                if (this.noInfoForFirst) {
                    return 'no-info-for-first';
                }

                if (this.noInfoForSecond) {
                    return 'no-info-for-second';
                }

                if (this.noInfoForThird) {
                    return 'no-info-for-third';
                }
            },

            showNextQuestionIfnoInfoForFirst(currentQuestionSection, nextSection, id, lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });

                if(this.currentSisterData['Type of Ministering'] !== '') {
                    this.showNextQuestion(currentQuestionSection, nextSection, id);
                    this.findFirstSister(lastName, firstName);
                    this.noInfoForFirst = false;
                    return;
                }
                this.questionsTwoHidden = true;
                this.questionsThreeHidden = true;
                this.questionsFourHidden = false;
                this.findFirstSister(lastName, firstName);
                this.progressBar();
            },

            showNextQuestionIfnoInfoForSecond(currentQuestionSection, nextSection, id, lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });

                if(this.currentSisterData['Type of Ministering'] !== '') {
                    this.showNextQuestion(currentQuestionSection, nextSection, id);
                    this.findSecondSister(lastName, firstName);
                    this.noInfoForSecond = false;
                    return;
                }
                this.findSecondSister(lastName, firstName);
                this.questionsFourHidden = true;
                this.questionsFiveHidden = true;
                this.questionsSixHidden = false;
            },

            showNextQuestionIfnoInfoForThird(currentQuestionSection, nextSection, id, lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });

                if(this.currentSisterData['Type of Ministering'] !== '') {
                    this.showNextQuestion(currentQuestionSection, nextSection, id);
                    this.findThirdSister(lastName, firstName);
                    this.noInfoForThird = false;
                    return;
                }
                this.findThirdSister(lastName, firstName);
                this.questionsSixHidden = true;
                this.completedTextHidden = false;
            },

            showNextQuestion(currentQuestionSection, nextSection, id) {
                this[currentQuestionSection] = !this[currentQuestionSection];
                this[nextSection] = !this[nextSection];
                this.progressBar();
                this.focusInput(id);
            },

            findFirstSister(lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });
                this.msOneMinisteringType = this.currentSisterData['Type of Ministering'];
                this.msOneAvailability = this.currentSisterData['Availability'];
                this.msOneTreat = this.currentSisterData['Treat'];
                this.msOneHobbies = this.currentSisterData['Hobbies'];
                this.msOneNumber = this.currentSisterData['Phone Number'];
            },

            findSecondSister(lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });
                this.msTwoMinisteringType = this.currentSisterData['Type of Ministering'];
                this.msTwoAvailability = this.currentSisterData['Availability'];
                this.msTwoTreat = this.currentSisterData['Treat'];
                this.msTwoHobbies = this.currentSisterData['Hobbies'];
                this.msTwoNumber = this.currentSisterData['Phone Number'];
            },

            findThirdSister(lastName, firstName) {
                this.currentSisterData = this.sistersData.find((sister) => {
                    return sister['Last Name'] === lastName && sister['First Name'] === firstName
                });
                this.msThreeMinisteringType = this.currentSisterData['Type of Ministering'];
                this.msThreeAvailability = this.currentSisterData['Availability'];
                this.msThreeTreat = this.currentSisterData['Treat'];
                this.msThreeHobbies = this.currentSisterData['Hobbies'];
                this.msThreeNumber = this.currentSisterData['Phone Number'];
            },

            finishQuestions(currentQuestionSection) {
                this[currentQuestionSection] = !this[currentQuestionSection];
                this.completedTextHidden = false;
            },

            progressBar() {
                let tracker = document.getElementById('tracker');
                let trackerWidth = tracker.style.width;
                trackerWidth = parseInt(trackerWidth);
                let newWidth = trackerWidth += 10;
                tracker.style.width = newWidth + '%';
            },

            focusInput(id) {
                this.$nextTick(function () {
                    document.getElementById(id).focus();
                });
            },

            reset() {
                this.companionOne = '';
                this.companionTwo = '';
                this.presMember = '';
                this.msOneFirstName = '';
                this.msOneLastName = '';
                this.msOneMinisteringType = '';
                this.msOneAvailability = '';
                this.msOneTreat = '';
                this.msOneNumber = '';
                this.msTwoFirstName = '';
                this.msTwoLastName = '';
                this.msTwoMinisteringType = '';
                this.msTwoAvailability = '';
                this.msTwoTreat = '';
                this.msTwoNumber = '';
                this.msThreeFirstName = '';
                this.msThreeLastName = '';
                this.msThreeMinisteringType = '';
                this.msThreeAvailability = '';
                this.msThreeTreat = '';
                this.msThreeHobbies = '';
                this.msThreeNumber = '';
                this.text = '';
                this.questionsOneHidden = false;
                this.questionsTwoHidden = true;
                this.questionsThreeHidden = true;
                this.questionsFourHidden = true;
                this.questionsFiveHidden = true;
                this.completedTextHidden = true;
                this.noInfoForFirst = true;
                this.noInfoForSecond = true;
                this.noInfoForThird = true;
                let tracker = document.getElementById('tracker');
                tracker.style.width = '0%';
                document.getElementById('copy-button').textContent= "Copy Text";

            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    h3 {
        margin: 40px 0 0;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        margin: 0 10px;
    }
    a {
        color: #42b983;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        background: #343085;
        margin-top: 1rem;
        display: flex;
    }

    .progress-tracker {
        width: 0;
        height: 10px;
        background: #b0d7d3;
        display: inline-block;
        transition: all .3s ease-in-out;
    }

    .question-section {
        display: flex;
        flex-direction: column;
    }


    .question-wrapper {
        display: flex;
        flex-direction: column;
        margin-bottom: 2rem;
    }

    .question-label {
        text-transform: uppercase;
        font-weight: 500;
        font-size: .7rem;
    }

    .question-input {
        border: solid 1px #000;
        padding: .5rem;
        font-size: 1.2rem;
        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        color: #343085;
    }

    .next-question {
        font-size: 2rem;
        text-align: right;
        background: #fff;
        border: none;
        transition: all .3s ease-in-out;
    }

    .next-question:hover {
        cursor: pointer;
        transform: translateX(10px);
        transition: all .3s ease-in-out;
    }

    .hidden {
        display: none;
    }

    .visible {
        display: inline-block;
    }

    .hidden-after-visible {
        display: none;
    }

    .text-to-review {
        font-size: .8rem;
    }

    .text-to-review-wrapper {
        margin-bottom: 1.5rem;
    }

    .text-answers {
        font-weight: 500;
    }

    .text-to-copy {
        opacity: 0;
        transform: translateX(1000px);
    }

    .copy-button {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        text-transform: uppercase;
        background: #343085;
        width: 95%;
        padding: 1rem;
        border: none;
        transition: all .3s ease-in-out;
    }

    .copy-button:hover, .start-again-button:hover {
        cursor: pointer;
        transform: scale(1.1);
        transition: all .3s ease-in-out;
    }

    .start-again-button {
        font-size: 1.2rem;
        font-weight: 600;
        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        text-transform: uppercase;
        width: 95%;
        padding: 1rem;
        border: 2px solid #000;
        background: #fff;
        margin-top: 2rem;
    }
</style>
